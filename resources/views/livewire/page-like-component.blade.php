<div>

    <div class="widget">
        <h4 class="widget-title">Your Channel</h4>
        <div  class="your-page">
            <figure>
                <img src="{{ asset('storage/'.$mychannel->image)}}">

            </figure>
            <div class="page-meta">
                <a href="{{ url('channel/'.$mychannel->slug) }}" title="" class="underline"> {{ $mychannel->name }} </a>
{{--                <span><i class="ti-comment"></i><a href="insight.html" title="">Messages <em>9</em></a></span>--}}
{{--                <span><i class="ti-bell"></i><a href="insight.html" title="">Notifications <em>2</em></a></span>--}}
            </div>
            <div class="page-likes">
                <ul class="nav nav-tabs likes-btn">
                    <li class="nav-item"><a class="active" href="#link1" data-toggle="tab">Follows</a></li>
{{--                     <li class="nav-item"><a class="" href="#link2" data-toggle="tab">views</a></li>--}}
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active fade show " id="link1" >
                    <span><i class="ti-heart"></i>{{ $mychannel->channellike->count() }}</span>
                      {{-- <a href="#" title="weekly-likes">35 new likes this week</a> --}}
                      <div class="users-thumb-list">

                          @foreach ($mychannel->channellike->take(10) as $chlike)

                          <a href="#" title="{{  $chlike->user->name  }}" data-toggle="tooltip">
                              <img style="height: 50px;width:50px;" src="{{ $chlike->user->profile_photo_path }}" alt="{{ $chlike->user->name }}">
                          </a>
                          @endforeach

                      </div>
                  </div>
{{--                  <div class="tab-pane fade" id="link2" >--}}
{{--                      <span><i class="ti-eye"></i>440</span>--}}
{{--                      <a href="#" title="weekly-likes">440 new views this week</a>--}}
{{--                      <div class="users-thumb-list">--}}
{{--                        <a href="#" title="Anderw" data-toggle="tooltip">--}}
{{--                            <img src="{{ asset('user/images/resources/userlist-1.jpg') }}" alt="">--}}
{{--                        </a>--}}
{{--                        <a href="#" title="frank" data-toggle="tooltip">--}}
{{--                            <img src="{{ asset('user/images/resources/userlist-2.jpg') }}" alt="">--}}
{{--                        </a>--}}
{{--                        <a href="#" title="Sara" data-toggle="tooltip">--}}
{{--                            <img src="{{ asset('user/images/resources/userlist-3.jpg') }}" alt="">--}}
{{--                        </a>--}}
{{--                        <a href="#" title="Amy" data-toggle="tooltip">--}}
{{--                            <img src="{{ asset('user/images/resources/userlist-4.jpg') }}" alt="">--}}
{{--                        </a>--}}
{{--                        <a href="#" title="Ema" data-toggle="tooltip">--}}
{{--                            <img src="{{ asset('user/images/resources/userlist-5.jpg') }}" alt="">--}}
{{--                        </a>--}}
{{--                        <a href="#" title="Sophie" data-toggle="tooltip">--}}
{{--                            <img src="{{ asset('user/images/resources/userlist-6.jpg') }}" alt="">--}}
{{--                        </a>--}}
{{--                        <a href="#" title="Maria" data-toggle="tooltip">--}}
{{--                            <img src="{{ asset('user/images/resources/userlist-7.jpg') }}" alt="">--}}
{{--                        </a>--}}
{{--                      </div>--}}
{{--                  </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
