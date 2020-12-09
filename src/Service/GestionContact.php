<?php

// src/service/gestionContact.php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;
use Doctrine\Persistence\ManagerRegistry;
use \Mailjet\Resources;
use Mailjet\Client;

/**
 * Description of GestionContact
 *
 * @author Benoît
 */
class GestionContact {

//documentation : https://swiftmailer.symfony.com/docs/sending.html
    function __construct() {
       
    }

    public static function envoiMailContactMessage(\App\Entity\Message $message) {
        $mj = new Client('da5118dd34a206ee00508be581d0edad', '6c63299258b4aeb010018c5fc9fa256c', true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "robin.bijaudy@gmail.com",
                        'Name' => "Robin"
                    ],
                    'To' => [
                        [
                            'Email' => $message->getMail(),
                            'Name' => $message->getPrenom()
                        ]
                    ],
                    'Subject' => "Test Mail",
                    'TextPart' => "My first Mailjet email",
                    'HTMLPart' => "<h3>Bonjour " . $message->getNom() . " " . $message->getPrenom() . "</h3>" . $message->getMessage(),
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }

    public static function EnregistrerMessage(Message $message): void {
        $em = $this->doctrine->getManager();
        $em->persist($message);
        $em->flush();
    }

}