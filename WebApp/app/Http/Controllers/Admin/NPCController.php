<?php

namespace App\Http\Controllers\Admin;

use App\Exporter\NPCExporter;
use App\Exporter\NPCTradeExporter;
use App\Http\Controllers\Controller;
use App\Models\NPC;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ZipArchive;

class NPCController extends Controller
{
    public function index(Request $request): View
    {
        $entries = NPC::sortable()->paginate();

        return view('admin.npc.index', [
            'entries' => $entries,
            'sort' => $request->query('sort', array_key_first(NPC::$sort)),
            'order' => $request->query('order', 'asc')
        ]);
    }

    public function create(): View
    {
        return view('admin.npc.add-edit');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(NPC $npc): View
    {
        $npc->load(['trades', 'trades.item']);
        return view('admin.npc.show', ['npc' => $npc]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NPC $npc): View
    {
        return view('admin.npc.add-edit', ['npc' => $npc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NPC $npc): RedirectResponse
    {
        $npc->delete();

        return redirect()->route('npc.index');
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
