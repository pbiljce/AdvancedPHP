<?php
    namespace AutomobilFunkcije;

    interface iVrata{
        public function openDoor($side);
        public function closeDoor($side);
        public function fixDoor($side);
    }
    interface iMotor{
        public function startEngine();
        public function shutdownEngine();
        public function fixEngine();
    }
    interface iVoznja{
        public function go();
        public function stop();
        public function break();
    }

    abstract class AutomobilFunkcije implements iVrata,iMotor,iVoznja{
        public function openDoor($side){ }
        public function closeDoor($side){ }
        public function fireUp(){ }
        public function shutDown(){ }
        public function fixDoor($side){ }
        public function startEngine(){ }
        public function shutdownEngine(){ }
        public function fixEngine(){ }
        public function go(){ }
        public function stop(){ }
        public function break(){ }
    }
?>
