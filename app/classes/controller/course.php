<?php

use Model\Courses;

class Controller_Course extends Controller
{
	/**
	 * Shows a list of all Courses
	 */
	public function action_index()
	{
		//load the layout
		$layout = View::forge('courses/layoutfull');

		//load the view
		$content = View::forge('courses/index');

		//get all courses
		$courses = Courses::getCourses();

		$CoursesString;

		//this loop converts all courses to a single string and stores them in $CoursesString
		foreach($courses as $key=>$course)
		{
			$CoursesString[$key] = $course['courseID']." ".$course['courseName']." ".$course['courseNumber']." ".$course['numOfAssignments'];
		}

		//set the courses to the view for printing
		$content->set_safe('demos', $CoursesString);

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
	}

	public function get_add()
	{
		//load the layout
		$layout = View::forge('courses/layoutfull');

		//load the view
		$content = View::forge('courses/add');

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
	}

	public function post_add()
	{
		//extract course name, number and assignments from the input parameters
		$name = $_POST['name'];
		$number = $_POST['number'];
		$assignments = $_POST['assignments'];

		//call the static method that saves a course
		Courses::saveCourse($name, $number, $assignments);

		//reload the index page with the newly saved view
		Response::redirect('index.php/course');
	}

}
