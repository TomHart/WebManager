<?php

namespace App\Http\Controllers\Admin;

use App\Exporter\NPCExporter;
use App\Exporter\NPCTradeExporter;
use App\Http\Controllers\Controller;
use App\Models\NPC;
use Illuminate\Http\Request;
use ZipArchive;

class NPCController extends Controller
{
    public function index()
    {
        return view('npc.index', ['entries' => NPC::with('trades')->get()->sortBy('TYPE')]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(NPC $npc)
    {
        $npc->load(['trades', 'trades.item']);
        return view('npc.show', ['npc' => $npc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {
        $npcs = NPC::with(['trades', 'trades.item'])->get();

        $exporters = [
            new NPCExporter(),
            new NPCTradeExporter()
        ];

        $files = [];
        foreach ($exporters as $exporter) {
            $files = array_merge($files, $exporter->export($npcs));
        }

        $zip = new ZipArchive();
        $zipFileName = "INI.zip";

        if (!$zip->open($zipFileName, ZIPARCHIVE::CREATE)) {
            die("Could not open archive");
        }

        foreach ($files as $name => $file) {
            $tmpFile = tempnam(sys_get_temp_dir(), 'INI');
            file_put_contents($tmpFile, $file);
            $zip->addFile($tmpFile, $name);
        }
        $zip->close();

        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename=' . $zipFileName);
        header('Content-Length: ' . filesize($zipFileName));
        readfile($zipFileName);

        unlink($zipFileName);
    }
}
