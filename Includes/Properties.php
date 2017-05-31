<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class works as a repository of all the string resources used in product UI
 * for easy translation and management. 
 *
 * @author rvgud
 */
class Properties
{

    public static function get($identifier)
    {
        switch ($identifier)
        {
            case 'ACCESS_TOKEN':
                return '577935649-IsYosowKwiGIVqQg2zGrhiZLU5dRm6RbL6hyupJr';
            case 'ACCESS_TOKEN_SECRET':
                return 'g5EXmpmU9rKWyF2GtaNaIPciW3c6BiCgHIqihuELCm0tc';
            case 'CONSUMER_KEY':
                return 'rjOhiPCNZewPjG17XyJ7Mguvb';
            case 'CONSUMER_SECRET':
                return 'e3Exfa3olWz7YjsaW50NJ4NMpX2jDNZkitn5vnntqFtnMXE4rx';
            default:
                return '';

        }
    }
}
