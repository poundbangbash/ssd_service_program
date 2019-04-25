<?php

use CFPropertyList\CFPropertyList;

class Ssd_service_program_model extends \Model
{
    public function __construct($serial = '')
    {
        parent::__construct('id', 'ssd_service_program'); //primary key, tablename
        $this->rs['id'] = '';
        $this->rs['serial_number'] = $serial; //$this->rt['serial_number'] = 'VARCHAR(255) UNIQUE';
        $this->rs['needs_service'] = null;
        
        // Add indexes
        $this->idx[] = array('serial_number');
        $this->idx[] = array('needs_service');

        // Schema version, increment when creating a db migration
        $this->schema_version = 1;
        
        // Create table if it does not exist
       //$this->create_table();
        
        if ($serial) {
            $this->retrieve_record($serial);
        }
        
        $this->serial = $serial;
    }
    
    
    // ------------------------------------------------------------------------

    /**
     * Process data sent by postflight
     *
     * @param string data
     *
     **/
    public function process($data)
    {
        $parser = new CFPropertyList();
        $parser->parse($data);

        $plist = $parser->toArray();

        foreach (array('needs_service') as $item) {
            if (isset($plist[$item])) {
                $this->$item = $plist[$item];
            } else {
                $this->$item = null;
            }
        }
        $this->save();
    }
}
