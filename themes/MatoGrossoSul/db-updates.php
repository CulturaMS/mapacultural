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
    'DROP Metadados duplicados - 3' => function () use ($conn, $app) {
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
        $app->log->debug("Limpaza de metados em agentes feita");


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
        $app->log->debug("Limpaza de metados em inscrições feita");
    },
    'DROP Evaluation 1731148439' => function () use ($conn, $app) {
        $conn->executeQuery("DELETE FROM registration_evaluation WHERE id = 2236");
        $app->log->debug("Apaga avaliação duplicada");
    },
    'UPDATE status Registrations 1851198763, 1213339754' => function () use ($conn, $app) {
        $conn->executeQuery("UPDATE registration SET status = 3 WHERE id IN (1851198763, 1213339754)");
        $app->log->debug("Atualiza status das inscrições 1851198763, 1213339754");
    },
    'DROP Evaluation 739077302' => function () use ($conn, $app) {
        $conn->executeQuery("DELETE FROM registration_evaluation WHERE id IN (4554)");
        $app->log->debug("Apaga avaliação duplicada 739077302");
    },
    'DROP Evaluation 1521292768, 435834864, 1677555209' => function () use ($conn, $app) {
        $conn->executeQuery("DELETE FROM registration_evaluation WHERE id in (6381, 6384, 5263, 6380, 6383, 5270, 6379, 6382, 6385)");
        $app->log->debug("Apaga avaliação duplicada");
    },
    'ALTER STATUS Inscrição 905257174' => function () use ($conn, $app) {
        $conn->executeQuery("UPDATE registration SET status = 3 WHERE id = 905257174");
        $app->log->debug("AAltera status inscrição 905257174 para não selecionada");
    }
];
