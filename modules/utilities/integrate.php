<?php
class integrate {
   
  static function addPresention($schedule, $presention, $week) {
    
    $newSchedule = array();
    $timeParser = new parseTime();
    
    $dagenNamen = array('Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag');
    
    foreach($schedule as $lesson) {
      $day = $timeParser::getTime($lesson->start);
      $Status = "";
      
      foreach($presention as $presentie) {
        foreach ($presentie as $weekPresention) {
         
          if ($weekPresention["week"] == $week) {
            
            foreach ($weekPresention["dagen"] as $dayPresention) {
               print_r($dayPresention);
              $Status = $dayPresention[(string)($lesson->startTimeSlot- 1)];
            }
            
          }
        }
      }
      
      $resetLesson = array("id"=>$lesson->id, "start"=>$lesson->start, "end"=>$lesson->end, "subjects"=>$lesson->subjects, 
      "teachers"=>$lesson->teachers, "groups"=>$lesson->groups, "locations"=>$lesson->locations, "type"=>$lesson->type, 
      "remark"=>$lesson->remark, "valid"=>$lesson->valid, "cancelled"=>$lesson->cancelled, "modified"=>$lesson->modified, 
      "moved"=>$lesson->moved, "changeDescription"=>$lesson->changeDescription, "startTimeSlot"=>$lesson->startTimeSlot, "endTimeSlot"=>$lesson->endTimeSlot, "branch"=>$lesson->branch, "branchOfSchool"=>$lesson->branchOfSchool, "created"=>$lesson->created, "lastModified"=>$lesson->lastModified, "hidden"=>$lesson->hidden, "appointmentInstance"=>$lesson->appointmentInstance, "new"=>$lesson->new, "dayOfWeek"=>$day, "status"=>$Status);
      
      $newSchedule[] = $resetLesson;
    }
    
    return $newSchedule;
  }
   
}
?>
