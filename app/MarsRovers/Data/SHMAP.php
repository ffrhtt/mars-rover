<?php
namespace App\MarsRovers\Data;
/**
 * Shared memory for objects
 *  extension=shmop must be enabled in php.ini 
 */
class SHMAP{
    private $shm_id;
    /**
     * Create/read data length byte shared memory block with system id of key
     */
    public function open($key,$length)
    {
        // Create 100 byte shared memory block with system id of 0xff3
        $this->shm_id = shmop_open($key, "c", 0644, $length);
        if (!$this->shm_id) {
            echo "Couldn't create shared memory segment\n";
        }
        // Get shared memory block's size
        $this->shm_size = shmop_size($this->shm_id);
        //echo "SHM Block Size: " . $this->shm_size . " has been created.\n";
    }
    /**
     * Write a text string into shared memory
     */
    public function write($text)
    {
        // Write a text string into shared memory
        $shm_bytes_written = shmop_write($this->shm_id, $text, 0);
        if ($shm_bytes_written != strlen($text)) {
            echo "Couldn't write the entire length of data\n";
        }
    }
    /**
     * Read a text string into shared memory
     */
    public function read()
    {
        $my_string = shmop_read($this->shm_id, 0, $this->shm_size);
        if (!$my_string) {
            echo "Couldn't read from shared memory block\n";
        }
        return $my_string;
    }
    /**
     * Read a text string into shared memory
     */
    public function delete()
    {
        //Now lets delete the block and close the shared memory segment
        
        if (!shmop_delete($this->shm_id)) {
            echo "Couldn't mark shared memory block for deletion.";
        }
    }
}