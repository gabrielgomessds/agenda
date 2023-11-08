<?php

namespace Source\App;

use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Schedule;

/**
 * Web Controller
 * @package Source\App
 */
class Web extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");

    }

    /**
     * SITE HOME
     */
    public function home(array $data): void
    {
        //adicionando novo evento
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $scheduleCreate = new Schedule();
            $scheduleCreate->title = $data["title"];
            $scheduleCreate->description = $data["description"];
            $scheduleCreate->start_datetime = $data["start_datetime"];
            $scheduleCreate->end_datetime = $data["end_datetime"];
        

            if (!$scheduleCreate->save()) {
                $json["message"] = $scheduleCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Evento adicionando com sucesso...")->flash();
            $json["redirect"] = url("/");

            echo json_encode($json);
            return;
        }

         //update
         if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $scheduleEdit = (new Schedule())->findById($data["id"]);

            if (!$scheduleEdit) {
                $this->message->error("Você tentou editar uma evento que não existe ou foi removida")->flash();
                echo json_encode(["redirect" => url("/")]);
                return;
            }

            $scheduleEdit->title = $data["title"];
            $scheduleEdit->description = $data["description"];
            $scheduleEdit->start_datetime = $data["start_datetime"];
            $scheduleEdit->end_datetime = $data["end_datetime"];

            if (!$scheduleEdit->save()) {
                $json["message"] = $scheduleEdit->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Evento atualizada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($_GET['action']) && $_GET['action'] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $scheduleDelete = (new Schedule())->findById($_GET['id']);

            if (!$scheduleDelete) {
                $json["message"] = $this->message->error("O evento não existe ou já foi excluída antes")->render();
                echo json_encode($json);
                return;
            }

            $scheduleDelete->destroy();

            $this->message->success("O evento foi excluído com sucesso")->flash();
            redirect("/");
            return;
        }

        //listando eventos
        $events = (new Schedule())->find()->fetch(true);
        

            $events_res = [];

            foreach ($events as $event) {
                $eventData = [
                    'id' => $event->id,
                    'title' => $event->title,
                    'description' => $event->description,
                    'start_datetime' => $event->start_datetime,
                    'end_datetime' => $event->end_datetime,
                    'sdate' => date("F d, Y h:i A", strtotime($event->start_datetime)),
                    'edate' => date("F d, Y h:i A", strtotime($event->end_datetime)),
                ];

                $events_res[strval($event->id)] = $eventData;
            }



        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("home", [
            "head" => $head,
            "sched_res" => $events_res
            
        ]);
    }


    /**
     * SITE NAV ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();
        $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops. Conteúdo indispinível :/";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido :/";
                $error->linkTitle = "Continue navegando!";
                $error->link = url_back();
                break;
        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}