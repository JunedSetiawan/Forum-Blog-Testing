<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\KategoryForum;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;

class PanelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('title', 'LIKE', "%{$value}%")
                        ->orWhere('body', 'LIKE', "%{$value}%")
                        ->orWhereHas('KategoryForum', function ($query) use ($value) {
                            $query->where('name', 'LIKE', "%{$value}%");
                        })
                        ->orWhereHas('KategoryForum.sub_kategory', function ($query) use ($value) {
                            $query->where('name', 'LIKE', "%{$value}%");
                        });
                });
            });
        });

        // $data = Forum::with('kategoryForum')->join('kategory_forums', 'kategory_forums.id', 'forums.kategory_forum_id'); 

        $kategory = KategoryForum::pluck('name', 'name')->toArray();
        $forums = QueryBuilder::for(Forum::class)
            ->allowedIncludes('KategoryForum', 'sub_kategory')
            ->with(['KategoryForum', 'KategoryForum.sub_kategory'])
            ->allowedSorts('title')
            ->allowedFilters(['title', 'body', $globalSearch, 'KategoryForum.name', 'KategoryForum.sub_kategory.name'])
            ->paginate()
            ->withQueryString();

        return view('panel.index', [
            'forums' => SpladeTable::for($forums)
                ->withGlobalSearch()
                ->column('title', searchable: true, sortable: true)
                ->column('body', searchable: true)
                ->column("KategoryForum.name", 'Kategory Forum', searchable: true)
                ->column("KategoryForum.sub_kategory.name", 'Sub kategory Forum', searchable: true)
                ->column('action')
                ->selectFilter('KategoryForum.name', $kategory),
        ]);
    }
}
