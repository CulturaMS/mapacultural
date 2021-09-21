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
    'DROP Metadados duplicados' => function () use ($conn) {
        $conn->executeQuery("DELETE FROM agent_meta m1 
            USING (
            SELECT MAX(id) as id, key, object_id 
            FROM agent_meta 
            GROUP BY key, object_id HAVING COUNT(*) > 1 
        ) m2 
        WHERE 
            m1.key = m2.key AND 
            m1.object_id = m2.object_id AND 
            m1.id <> m2.id;");


        $conn->executeQuery("DELETE FROM registration_meta m1 
            USING (
                SELECT MAX(id) as id, key, object_id 
                FROM registration_meta 
                GROUP BY key, object_id HAVING COUNT(*) > 1 
            ) m2 
            WHERE 
                m1.key = m2.key AND 
                m1.object_id = m2.object_id AND 
                m1.id <> m2.id;");
    }
];