<?php
namespace App\Services\Auth\AdminUi;

use App\Dto\AdminUi\CourseDTO;
use App\Dto\AdminUi\CourseModuleDTO;
use App\Models\Course;
use App\Models\CourseModule;
use Ramsey\Uuid\Uuid;
use Throwable;

/**
 * Class CourseService
 * @package App\Services\Auth\AdminUi
 * @author Dotanin Dev <dotanindev@gmail.com>
 */

class CourseService
{
 
    /**
     * @param CourseDTO $courseData
     * @throws \Throwable
     */
    public function createCourse(CourseDTO $courseData)
    {
        Course::create([
            'name' => $courseData->name,
            'code'=> Uuid::uuid4(),
            'currency_id'=>currency()->id,
            'description' => $courseData->description,
        ]);
    }

    /**
     * @param CourseDTO $courseData
     * @param int $courseId
     * @throws \Throwable
     */

    public function updateCourse(CourseDTO $courseData, int $courseId)
    {
        Course::where('id', $courseId)->update([
            'name' => $courseData->name,
            'description' => $courseData->description,
        ]);
    }

    /**
     * @param int $courseId
     * @throws \Throwable
     * @return void
     */
    public function deleteCourse(int $courseId)
    {
        Course::where('id', $courseId)->delete();
    }

    /**
     * @param int $courseId
     * @throws \Throwable
     * @return Course
     */
    public function getCourse(int $courseId): Course
    {
        return Course::findOrFail($courseId);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     * @throws \Throwable
     * @return Course[]
     */
    public function getAllCourses(): \Illuminate\Database\Eloquent\Collection
    {
        return Course::all();
    }


    // Course Module Area

    /**
     * @param CourseModuleDTO $courseModuleData
     * @throws \Throwable
     * @return void
     */
    public function createModule(CourseModuleDTO $courseModuleData)
    {
        CourseModule::create([
            'name' => $courseModuleData->name,
            'description' => $courseModuleData->description,
            'course_id' => $courseModuleData->courseId,
        ]);
    }


    /**
     * @param CourseModuleDTO $courseModuleData
     * @param int $moduleId
     * @throws \Throwable
     */
    public function updateModule(CourseModuleDTO $courseModuleData, int $moduleId)
    {
        CourseModule::where('id', $moduleId)->update([
            'name' => $courseModuleData->name,
            'description' => $courseModuleData->description,
            'course_id' => $courseModuleData->courseId,
        ]);
    }


    /**
     * @param int $moduleId
     * @throws \Throwable
     * @return void
     */
    public function deleteModule(int $moduleId)
    {
        CourseModule::where('id', $moduleId)->delete();
    }

    /**
     * @param int $moduleId
     * @return Course
     * @throws \Throwable
     */
    public function getModule(int $moduleId): Course
    {
        return CourseModule::findOrFail($moduleId);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     * @throws \Throwable
     */
    public function getAllModules(): \Illuminate\Database\Eloquent\Collection
    {
        return CourseModule::all();
    }
}
