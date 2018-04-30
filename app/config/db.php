<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

 return array(
   /**
    * Base MySQLi config
    */
     'default' => array(
       'type'           => 'mysqli',
       'connection'     => array(
         'hostname'       => 'faure.cs.colostate.edu',
         'port'           => '3306',
         'database'       => 'tsciano',
         'username'       => 'tsciano',
         'password'       => '830913546',
         'persistent'     => false,
         'compress'       => false,
       ),
       'identifier'     => '`',
       'table_prefix'   => '',
       'charset'        => 'utf8',
       'enable_cache'   => true,
       'profiling'      => false,
       'readonly'       => false,
     ),
);
