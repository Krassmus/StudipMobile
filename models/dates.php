<?php

class Dates {

    # TODO args?
    static function findAll($user_id, $days = 1, $future = true)
    {
        $future = Request::int('future', $future);
        $days   = Request::int('days', $days);

        $items = self::get_dates($user_id, $days, $future);
        $items = self::filter_utf8($items);

        return $items;
    }

    function filter_utf8($items)
    {
        foreach ($items as &$item) {
            foreach ($item as &$value) {
                if (is_string($value)) {
                    $value = utf8_encode($value);
                }
            }
        }
        return $items;
    }

    /**
     * Get all activities for this user as an array.
     */
    private function get_dates($user_id, $days, $future)
    {
        $items = array();

        $start_date = time() - 3600;
        $end_date   = strtotime('+2 years'); // #TODO: use passed variables

        if (get_config('CALENDAR_ENABLE')) {
            $list = new DbCalendarEventList(new SingleCalendar($user_id, Calendar::PERMISSION_OWN),
                $start_date, $end_date, true, Calendar::getBindSeminare($user_id));

            if ($list->existEvent()) {
                while($date = $list->nextEvent()) {
                    $singledate = SingleDate::getInstance($date->getId());
                    $items[] = array(
                        'id'      => $date->getId(),
                        'start'   => $date->getStart(),
                        'end'     => $date->getEnd(),
                        'title'   => $date->getTitle(),
                        'content' => $date->getDescription(),
                        'semname' =>  (strtolower(get_class($date)) == 'seminarcalendarevent'
                            ? $termin->getSemName() : false),
                        'room'    => $singledate->getRoom()

                    );
                }
            }
        } else {
            $stmt = DBManager::get()->prepare($query = "SELECT t.date as start, "
                . "t.end_time as end, t.termin_id as id, "
                . "th.title as title, th.description as content, "
                . "ro.name as room, s.Name as semname FROM termine t "
                . "LEFT JOIN themen_termine USING (termin_id) "
                . "LEFT JOIN themen as th USING (issue_id) "
                . "LEFT JOIN seminare s ON (range_id = s.Seminar_id) "
                . "LEFT JOIN seminar_user su ON (s.Seminar_id = su.Seminar_id) "
                . "LEFT JOIN resources_assign ra ON (ra.assign_user_id = t.termin_id) "
                . "LEFT JOIN resources_objects ro ON (ro.resource_id = ra.resource_id) "
                . "WHERE (user_id = ?) ORDER BY date DESC");

            $stmt->execute(array($user_id));

            // echo str_replace('?', "'$user_id'", $query);die;
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $items;
    }
}
