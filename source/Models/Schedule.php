<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 * @author Gabriel Gomes <gabrielgomessdasilva13@gmail.com>
 * @package Source\Models
 */
class Schedule extends Model
{
    /**
     * Schedule constructor.
     */
    public function __construct()
    {
        parent::__construct("schedule_list", ["id"], ["title", "description", "start_datetime", "end_datetime"]);
    }

    /**
     * @param string $title
     * @param string $description
     * @param string $start_datetime
     * @param string $end_datetime
     * @param string $password
     * @return Schedule
     */
    public function bootstrap(
        string $title,
        string $description,
        string $start_datetime,
        string $end_datetime,
    ): Schedule {
        $this->title = $title;
        $this->description = $description;
        $this->start_datetime = $start_datetime;
        $this->end_datetime = $end_datetime;
        return $this;
    }


    /**
     * @return bool
     */
    public function save(): bool
    {

        /** User Update */
        if (!empty($this->id)) {
            $eventId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$eventId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {

            $eventId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($eventId))->data();
        return true;
    }
}