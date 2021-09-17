<?php
$app = MapasCulturais\App::i();
$em = $app->em;
$conn = $em->getConnection();

return [
    'DROP registration duplicate MS Cultura Cidadã 01' => function () use ($app, $em, $conn) {
        $dql = "SELECT 
                    r 
                FROM 
                    MapasCulturais\\Entities\\Registration r
                WHERE  
                    r.owner IN ('3023', '715') AND 
                    r.opportunity = '137' AND 
                    r.id IN ('210192917','289763953', '177544470')";
                
        $query = $app->em->createQuery($dql);
        $registrations = $query->getResult();

        $result = [];
        foreach ($registrations as $registration) {
            try {
                $registration->delete();
                $result[] = $registration->id . " - Inscrição Deletada com sucesso";
            } catch (\Throwable $th) {
                $result[] = $registration->id . " - Inscrição Não deletada";
            }           
        }

        file_put_contents(BASE_PATH."files/delete_duplecated_registrations_ms_cuturacidada_01_log-dbupdate.txt", implode("\n",$result));
    },
];
