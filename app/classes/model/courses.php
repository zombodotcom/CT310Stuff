<?php

namespace Model;

class Courses {

	//this method will return the courses from the database
	public static function getCourses()
	{
		//Note: we have to use global scope ('\') while calling DB object
		$query = \DB::select('*')->from('courses')->execute();
		return $query;
	}

	//this method saves a given course
	public static function saveCourse($courseName, $courseNumber, $assignments)
	{
		//Note: we have to use global scope ('\') while calling DB object
		$query = \DB::insert('courses');

		// Set the columns and values
		$query->set(array(
			'courseName' => $courseName,
			'courseNumber' => $courseNumber,
			'numOfAssignments' => $assignments,
		));

		$query->execute();
	}

}
