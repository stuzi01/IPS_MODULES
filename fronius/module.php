<?
   // Klassendefinition
    class fronius extends IPSModule {
	    
	    
	    // Überschreibt die interne IPS_Create($id) Funktion
        public function Create() {
            // Diese Zeile nicht löschen.
        parent::Create();
	$this->RegisterPropertyString("ip", "ip Adresse im DFormat xxx.xxx.xxx.xxx");
	    
        }
 
        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Diese Zeile nicht löschen
            parent::ApplyChanges();
	$this->CreateCategoryByIdent($this->InstanceID, "PV", "PV");
   	$this->CreateCategoryByIdent($this->InstanceID, "Sensors", "Sensors");
	$this->CreateCategoryByIdent($this->InstanceID, "Targets", "Alert Target");
	$this->CreateVariableByIdent($this->InstanceID, "Active", "Active", 0, "~Switch");
	$this->EnableAction("Active");
	$this->CreateVariableByIdent($this->InstanceID, "Alert", "Alert", 0, "~Alert");
	$this->EnableAction("Alert");
	
        }
	    
	public function Destroy() {
	//Never delete this line!
	parent::Destroy();
	}

 
        /**
        * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
        * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
        *
        * ABC_MeineErsteEigeneFunktion($id);
        *
        */
	public function PVShowData() 
	{
		// test
	}
	public function PVGetData() 
	{
		// test
	}
	    
	    
	    
	    		private function CreateCategoryByIdent($id, $ident, $name) {
			
			 $cid = @IPS_GetObjectIDByIdent($ident, $id);
			 if($cid === false)
			 {
				 $cid = IPS_CreateCategory();
				 IPS_SetParent($cid, $id);
				 IPS_SetName($cid, $name);
				 IPS_SetIdent($cid, $ident);
			 }
			 return $cid;
		}
		
		private function CreateVariableByIdent($id, $ident, $name, $type, $profile = "") {
			
			 $vid = @IPS_GetObjectIDByIdent($ident, $id);
			 if($vid === false)
			 {
				 $vid = IPS_CreateVariable($type);
				 IPS_SetParent($vid, $id);
				 IPS_SetName($vid, $name);
				 IPS_SetIdent($vid, $ident);
				 if($profile != "")
					IPS_SetVariableCustomProfile($vid, $profile);
			 }
			 return $vid;
		}
}
?>

