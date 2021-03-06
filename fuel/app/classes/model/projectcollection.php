<?php

class Model_ProjectCollectionException extends Exception {}

class Model_ProjectCollection 
{
    protected $member_id;
    protected $query;

    public function __construct($parent_id)
    {
        $this->member_id = $parent_id;
    }

    private function query()
    {
        return Model_Project::find()->where('member_id', $this->member_id);
    }

    public function add(Model_Project $project)
    {
        if ($this->query()->where('name', $project->name)->count() > 0) {
            throw new Model_ProjectCollectionException("Member already has this project");
        }
        $project->member_id = $this->member_id;

        $project->save();   
    }

    public function get_all()
    {
        return $this->query()
            ->order_by('name', 'asc')
            ->get();
    }

    public function get_active()
    {
        return $this->query()
            ->where('is_active', 1)
            ->order_by('name', 'asc')
            ->get();
    }

    public function get_by_id($id)
    {
        $project = $this->query()->where('id', $id)->get_one();
        if (! $project) {
            throw new Model_ProjectCollectionException("Project does not exist in collection");
        }
        return $project;
    }

    public function get_periodoftimes_by_date(DateTime $date)
    {
        $timestamp = $date->getTimestamp();
        $day_after_timestamp = $timestamp + 86400;

        return Model_PeriodOfTime::find()
            ->where('created_at', '>=', $timestamp)
            ->where('created_at', '<', $day_after_timestamp)
            ->related('project')
            ->where('project.member_id', $this->member_id)
            ->get();
    }

    public function get_most_recent_periodoftime()
    {
        return Model_PeriodOfTime::query()
            ->related('project')
            ->where('project.member_id', $this->member_id)
            ->order_by('id', 'desc')
            ->get_one();
    }

    public function get_periodotime_by_id($id)
    {
        $time = Model_PeriodOfTime::query()
            ->where('id', $id)
            ->related('project')
            ->where('project.member_id', $this->member_id)
            ->order_by('id', 'desc')
            ->get_one();

        if (!$time) {
            throw new Model_ProjectCollectionException("PeriodOfTime does not exist in collection");
        }

        return $time;
    }
}
