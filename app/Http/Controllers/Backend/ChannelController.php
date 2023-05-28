<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Package;
use App\Models\PackageOrder;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
        Paginator::useBootstrapFive();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('channel.view')) {
            abort(403, 'Unauthorized Access');
        }
        $pageHeader = [
            'title' => "Channel",
            'sub_title' => "Channel List"
        ];
        $channels = Channel::paginate(10);
        return view('backend.pages.channel.index', compact('channels', 'pageHeader'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Unauthorized Access');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Unauthorized Access');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('channel.edit')) {
            abort(403, 'Unauthorized Access');
        }
        $pageHeader = [
            'title' => "Channel",
            'sub_title' => "Channel List"
        ];
        $channel = Channel::find($id);
        return view('backend.pages.channel.edit', compact('channel', 'pageHeader'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Unauthorized Access');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403, 'Unauthorized Access');
        }
        $row = Channel::find($id);
        $row->delete();
        return back();
    }

//    Packages

    public function packages($user_id)
    {
        if (is_null($this->user) || !$this->user->can('package.view')) {
            abort(403, 'Unauthorized Access');
        }
        $data['pageHeader'] = [
            'title' => "Package",
            'sub_title' => "Package List"
        ];
        $data['packages'] = Package::where('user_id', $user_id)->paginate(10);
        return view('backend.pages.channel.packages', $data);
    }

    public function editPackage($id)
    {

    }

    public function deletePackage($id)
    {
        if (is_null($this->user) || !$this->user->can('package.delete')) {
            abort(403, 'Unauthorized Access');
        }
        $row = Package::find($id);
        $row->delete();
        return back();

    }

    public function deleteOrder($id)
    {
        if (is_null($this->user) || !$this->user->can('package_order.delete')) {
            abort(403, 'Unauthorized Access');
        }
        $row = PackageOrder::find($id);
        $row->delete();
        return back();

    }

    public function packageOrders($package_id)
    {
        if (is_null($this->user) || !$this->user->can('package_order.view')) {
            abort(403, 'Unauthorized Access');
        }
        $data['pageHeader'] = [
            'title' => "Package Order",
            'sub_title' => "Package Order List"
        ];
        $data['orders'] = PackageOrder::where('package_id', $package_id)->paginate(10);
        return view('backend.pages.channel.orders', $data);
    }

}

