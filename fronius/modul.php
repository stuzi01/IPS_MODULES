<?
    // Klassendefinition
    class Fronius extends IPSModule {
        /**
        * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
        * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
        *
        * ABC_MeineErsteEigeneFunktion($id);
        *
        */
        
    private $client;
    private $tokens;     	
    private $refresh_token;
    private $access_token;
    private $deviceList;
    private $echoString;
        
        
        
        public function MeineErsteEigeneFunktion() {
            echo $this->InstanceID;
        }
    }
?>

