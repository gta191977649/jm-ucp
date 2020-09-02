<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class InformationController extends Controller
{
    public function status() {
        return view('status.index');
    }

    public function query() {
        try {
            $query = new \SAMPQuery('justnowmovie.sparrow.moe', '7777');
            if ($query->isOnline()) {
                $aInformation = $query->getInfo();
                $aPlayers = $query->getDetailedPlayers();
                
                return response()->json([
                    'status' => '200',
                    'info' => mb_convert_encoding( $aInformation, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5' ),
                    'player' =>mb_convert_encoding( $aPlayers, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5' )
                ]);
            }
            /*
            $info = array(
                'hostname'       => $server->info('hostname'),
                'currentPlayers' => $server->info('currentPlayers'),
                'maxPlayers'     => $server->info('maxPlayers'),
                'gamemode'       => $server->info('gamemode'),
                'language'       => $server->info('language'),
                'ping'           => $server->info('ping')
            );
            
            $info['players'] = $server->info('detailedPlayers');
            */
            return response()->json([
                'status' => '500',
                'err' => 'Server Offline!'
            ]);

        } catch (exception $err) {
            return response()->json([
                'status' => '500',
                'err' => $err
            ]);
        }
    }
}
