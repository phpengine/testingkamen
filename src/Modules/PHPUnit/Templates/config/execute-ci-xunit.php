<?php

phpUnitCiExecutor::execute();

class phpUnitCiExecutor {

    public static function execute(){
        self::performUnitTests(); }

    private function performUnitTests(){
        $scriptLocation = dirname(__FILE__);
        $fullTestDir = str_replace("/config/phpunit", "/tests/phpunit", $scriptLocation);
        $fullReportDir = str_replace("/config/phpunit", "/reports/phpunit/junit/ci-junit.xml", $scriptLocation);
        $command =  "phpunit --configuration ".dirname(__FILE__).'/phpunit.xml --log-junit ';
        $command .= $fullReportDir.' --stderr '.$fullTestDir;
        self::executeAndOutput($command); }

    private static function executeAndOutput($command) {
        $outputArray = array();
        exec($command, $outputArray);
        echo "\nOutput for Command $command:\n";
        foreach ($outputArray as $outputValue) {
            echo "$outputValue\n"; } }

}

?>