# PHPLogger


| **Table of Contents**                                         |
|---------------------------------------------------------------|
| [Project Description](#Project-Description)                   |
| [Project Structure](#Project-Structure)                       |
| [Usability and Implementation](#Usability-and-Implementation) |
| [Methods](#Methods)                                           |



### Project Description

PHPLogger is a logger project which is 100% written in [PHP](https://www.php.net/) [(V.7)](https://www.php.net/manual/en/), PHPLogger is easy to use and implement in any PHP already existing solution.

**Requirements**
- PHP
- PHP (V.7 or higher)

~~___________________________________________________________________________________________________________________________________~~

### Project Structure
```
PHPLogger (Project)
│__ README.md
│__ LICENSE    
│
└─── Logger
│   |__ ILogger.php
│   │__ Logger.class.php
```
~~___________________________________________________________________________________________________________________________________~~

### Usability and Implementation

1. Import the Logger Folder to your PHP project
2. Inherit the Logger object to the PHP file where you wish to implement logging functionality 

   <pre>
    <code class="php">
        // Logger Class inheritance
          require('../[Your_path_to_file]/../Logger/Logger.class.php'); 
        
        // ... Your PHP Code ...
    </code>
  </pre>

3. Use the `$logger` variable to reffer to the Logger object instance
4. Use any of the Logger objects [methods](#Methods) to write the wanted level log message

<pre>
    <code class="php">
        // ... Your PHP Code ...
          $logger->debug('Debug Message Examaple');
          $logger->success('Regitration completed with sucess for user ID:[' + $user_id + ']');
        
        // ... Your PHP Code ...
    </code>
  </pre>
  
6. The Log file will be created with name [YYYYMMDD].log in the automatically created Logs folder inside the Logger Folder


~~___________________________________________________________________________________________________________________________________~~

### Methods

 - #### createLogDirectory()
    > Method Summary - Creates Logs folder if this doesn't exists
    > 
    > Note - Do not change this method, changing this method may result in breaking the project **if necessary change it at your one risk!**
  
 - #### getFileName()
    > Method Summary - GET log file name [YYYYMMDD] (Ex: 20210815.log)
    > 
    > Note - Do not change this method, changing this method may result in breaking the project **if necessary change it at your one risk!**

 - #### createLogFile( $nome_ficheiro )
    > Method Summary - Creates Logs file if this doesn't exists
    >> Vars:
    >> 
    >> `$nome_ficheiro` - full path to logger file to be created
    >> 
    > Note - Do not change this method, changing this method may result in breaking the project **if necessary change it at your one risk!**

 - #### getLogFile( $nome_ficheiro )
    > Method Summary - GET current log file [The current day Log fie and the one which will be written]
    >> Vars:
    >> 
    >> `$nome_ficheiro` - full path to the current day logger file
    >> 
    > Note - Do not change this method, changing this method may result in breaking the project **if necessary change it at your one risk!**

 - #### debug( $msg )
    > Method Summary - Writes DEBUG level message
    >> Vars:
    >> 
    >> `$msg` - Debug level message to be written in the log file

- #### success( $msg )
    > Method Summary - Writes SUCCESS level message
    >> Vars:
    >> 
    >> `$msg` - Success level message to be written in the log file


- #### warning( $msg )
    > Method Summary - Writes WARNING level message
    >> Vars:
    >> 
    >> `$msg` - Warning level message to be written in the log file

- #### warningWithTrace( $msg, $trace )
    > Method Summary - Writes WARNING level message
    >> Vars:
    >> 
    >> `$msg` - Warning level message to be written in the log file
    >> 
    >> `$trace` - Error stackTrace


- #### error( $msg )
    > Method Summary - Writes ERROR level message
    >> Vars:
    >> 
    >> `$msg` - Error level message to be written in the log file

- #### errorWithTrace( $msg, $trace )
    > Method Summary - Writes ERROR level message
    >> Vars:
    >> 
    >> `$msg` - Error level message to be written in the log file
    >> 
    >> `$trace` - Error stackTrace


- #### severe( $msg )
    > Method Summary - Writes SEVERE level message
    >> Vars:
    >> 
    >> `$msg` - Severe level message to be written in the log file

- #### severeWithTrace( $msg, $trace )
    > Method Summary - Writes SEVERE level message
    >> Vars:
    >> 
    >> `$msg` - Severe level message to be written in the log file
    >> 
    >> `$trace` - Error stackTrace

~~___________________________________________________________________________________________________________________________________~~
