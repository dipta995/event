<div wire:poll.keep-alive>
    @livewire('channel-post-component')


    <div class="loadMor">
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        @php
                            $channelimage = json_decode(collect($post->channel['image']), true);
                        @endphp
                        @foreach($channelimage as $key=>$imageaa)

                            <img src="{{ asset('storage/'.$imageaa)}}">

                        @endforeach
                        {{-- <img src="{{ $post->channel->image }}" alt=""> --}}
                    </figure>
                    <div class="friend-name">
                        <ins><a href="{{ url('/channel') }}/{{ $post->channel->slug  }}"
                                title="">{{ $post->channel->name  }}</a>
                            @php
                                $usrid=auth()->user()->id;
                                $channellike = DB::table('channellikes')->where('user_id',$usrid)->where('channel_id',$post->channel_id)->where('like','yes');

                            @endphp
                            @if ($channellike->count()>0)
                                <a style="color: white; height: 30px;font-size: 12px;" class="btn btn-secondary"
                                   wire:click.prevent="removeChannelLike({{ $usrid }},{{ $post->channel_id }})"
                                   href="#"><i class="fa fa-undo"></i> Unfollow</a>
                            @else

                                <a style="color: white; height: 30px;font-size: 12px;" class="btn btn-danger" href=""
                                   wire:click.prevent="addChannelLike({{ $usrid }},{{ $post->channel_id }})"><i
                                        class="fa fa-user-plus"></i> Follow</a>
                            @endif
                            @if($channelOwner = \App\Models\Channel::where('user_id',auth()->id())->first())
                                @if($channelOwner->id == $post->channel_id)
                                    <a style="color: white; height: 30px;font-size: 12px;"
                                       class="btn btn-danger float-right" href="{{ route('edit.post',$post->id) }}"><i
                                            class="fa fa-user-plus"></i> Edit</a>
                                    <a style="color: white; height: 30px;font-size: 12px;"
                                       class="btn btn-danger float-right"
                                       wire:click.prevent="deletePost({{ $post->id }})"><i
                                            class="fa fa-trash"></i> Delete</a>
                                @else
                                    <a style="color: white; height: 30px;font-size: 12px;"
                                       class="btn btn-danger float-right" href="{{ route('report',$post->id) }}"><i
                                            class="fa fa-user-plus"></i> Report</a>
                                @endif
                            @else
                                <a style="color: white; height: 30px;font-size: 12px;"
                                   class="btn btn-danger float-right" href="{{ route('report',$post->id) }}"><i
                                        class="fa fa-user-plus"></i> Report</a>
                            @endif
                        </ins>
                        <span>published: {!! date('d/M/Y H:i:s', strtotime($post->created_at)) !!}</span>
                    </div>
                    <div class="description">

                        <p>
                            {{ $post->post_text }}
                        </p>
                    </div>
                    <div class="post-meta">
                        <div class="row">


                            @php
                                $postimages = json_decode($post->postimage['image'], true);
                            @endphp
                            @foreach($postimages as $key=>$imageaa)
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/'.$imageaa)}}">

                                </div>

                            @endforeach
                        </div>
                        <div class="we-video-info">
                            <ul>
                                {{-- <li>
                                    <span class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </span>
                                </li> --}}
                                {{-- <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>52</ins>
                                    </span>
                                </li> --}}
                                <li>
                                    <style>
                                        .fill-hart {
                                            color: red;

                                        }
                                    </style>
                                    <span class="like" data-toggle="tooltip" title="like">
                              @php
                                  $usrid=auth()->user()->id;
                                  $postlike = DB::table('postlikes')->where('user_id',$usrid)->where('post_id',$post->id)->where('like','yes');
                              @endphp
                                        @if ($postlike->count()>0)
                                            <a wire:click.prevent="removePostLike({{ $usrid }},{{ $post->id }})"
                                               href="#"><i class="fill-hart fa fa-heart"></i></a>
                                        @else
                                            <a wire:click.prevent="addPostLike({{ $usrid }},{{ $post->id }})"><i
                                                    class="ti-heart"></i></a>

                                        @endif
                                <ins>{{ number_format_short($post->postllike->count()) }}</ins>
                            </span>
                                </li>
                                {{-- <li>
                                    <span class="dislike" data-toggle="tooltip" title="dislike">
                                        <i class="ti-heart-broken"></i>
                                        <ins>200</ins>
                                    </span>
                                </li> --}}
                                {{--                        <li class="social-media">--}}
                                {{--                            <div class="menu">--}}
                                {{--                              <div class="btn trigger"><i class="fa fa-share-alt"></i></div>--}}
                                {{--                              <div class="rotater"></div>--}}
                                {{--                              <div class="rotater">--}}
                                {{--                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>--}}
                                {{--                              </div>--}}
                                {{--                              <div class="rotater">--}}
                                {{--                                  <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="rotater">--}}
                                {{--                                  <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>--}}
                                {{--                                </div>--}}
                                {{--                              </div>--}}
                                {{--                              <div class="rotater"></div>--}}
                                {{--                              --}}{{-- <div class="rotater">--}}
                                {{--                                  <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="rotater">--}}
                                {{--                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="rotater">--}}
                                {{--                                  <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>--}}
                                {{--                                </div>--}}
                                {{--                              <div class="rotater">--}}
                                {{--                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>--}}
                                {{--                                </div>--}}
                                {{--                              </div>--}}
                                {{--                              <div class="rotater">--}}
                                {{--                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>--}}
                                {{--                              </div> --}}

                                {{--                            </div>--}}
                                {{--                        </li>--}}


                            </ul>
                        </div>

                    </div>
                </div>
                <div class="coment-area">
                    <ul class="we-comet">
                        <!-- Contenedor Principal -->
                        <div class="post-comt-box">
                            @livewire('comment-component',['postid' => $post->id])
                        </div>

                        <div class="comments-container">
                            <h4>Comments({{ $post->comment->count() }}) </h4>


                            <ul id="comments-list" class="comments-list">

                                @foreach ($post->comment as $comments)

                                    <li>
                                        <div class="comment-main-level">
                                            <!-- Avatar -->
                                            <div class="comment-avatar"><img
                                                    src="{{ $comments->user->profile_photo_path}}" alt=""></div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><a
                                                            href="#"> {{ $comments->user->name }}</a></h6>
                                                    <span> {{ $comments->created_at }}</span>
                                                    @if ( auth()->user()->id == $comments->user->id )
                                                        <a wire:click.prevent="commentdelete({{ $comments->id }})"
                                                           href="#" class="btn"><i class="fa fa-trash"
                                                                                   aria-hidden="true"></i></a>
                                                    @endif


                                                </div>
                                                <div class="comment-content">
                                                    {{ $comments->comment }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Respuestas de los comentarios -->
                                        <ul class="comments-list reply-list">

                                            @php

                                                $commentreplay = DB::table('users')->join('postreplays', 'users.id', '=', 'postreplays.user_id')->where('postreplays.comment_id',$comments->id)->get();
                                            @endphp
                                            @foreach ($commentreplay as $replays)

                                                <li>
                                                    <!-- Avatar -->
                                                    <div class="comment-avatar"><img
                                                            src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg"
                                                            alt=""></div>
                                                    <!-- Contenedor del Comentario -->
                                                    <div class="comment-box">
                                                        <div class="comment-head">
                                                            <h6 class="comment-name"><a
                                                                    href="#">{{ $replays->name }}</a></h6>
                                                            <span>{{ $replays->created_at }}</span>
                                                            @if ( auth()->user()->name == $replays->name )

                                                                <a wire:click.prevent="replaytdelete({{ $replays->id }})"
                                                                   href="#"><i class="fa fa-trash"
                                                                               aria-hidden="true"></i>{{ $replays->id }}
                                                                </a>
                                                            @endif


                                                        </div>
                                                        <div class="comment-content">
                                                            {{ $replays->replay }}
                                                        </div>
                                                    </div>
                                                </li>

                                            @endforeach


                                        </ul>

                                    </li>
                                @endforeach


                            </ul>
                        </div>

                        <!-- Contenedor Principal -->


                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>


<style>
    /**
 * Oscuro: #283035
 * Azul: #03658c
 * Detalle: #c7cacb
 * Fondo: #dee1e3
 ----------------------------------*/
    * {
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    a {
        color: #03658c;
        text-decoration: none;
    }

    ul {
        list-style-type: none;
    }

    body {
        font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
        background: #dee1e3;
    }

    /** ====================
     * Lista de Comentarios
     =======================*/
    .comments-container {
        margin: 60px auto 15px;
        width: 768px;
    }

    .comments-container h1 {
        font-size: 36px;
        color: #283035;
        font-weight: 400;
    }

    .comments-container h1 a {
        font-size: 18px;
        font-weight: 700;
    }

    .comments-list {
        margin-top: 30px;
        position: relative;
    }

    /**
     * Lineas / Detalles
     -----------------------*/
    .comments-list:before {
        content: '';
        width: 2px;
        height: 100%;
        background: #c7cacb;
        position: absolute;
        left: 32px;
        top: 0;
    }

    .comments-list:after {
        content: '';
        position: absolute;
        background: #c7cacb;
        bottom: 0;
        left: 27px;
        width: 7px;
        height: 7px;
        border: 3px solid #dee1e3;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .reply-list:before, .reply-list:after {
        display: none;
    }

    .reply-list li:before {
        content: '';
        width: 60px;
        height: 2px;
        background: #c7cacb;
        position: absolute;
        top: 25px;
        left: -55px;
    }


    .comments-list li {
        margin-bottom: 15px;
        display: block;
        position: relative;
    }

    .comments-list li:after {
        content: '';
        display: block;
        clear: both;
        height: 0;
        width: 0;
    }

    .reply-list {
        padding-left: 88px;
        clear: both;
        margin-top: 15px;
    }

    /**
     * Avatar
     ---------------------------*/
    .comments-list .comment-avatar {
        width: 65px;
        height: 65px;
        position: relative;
        z-index: 99;
        float: left;
        border: 3px solid #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .comments-list .comment-avatar img {
        width: 100%;
        height: 100%;
    }

    .reply-list .comment-avatar {
        width: 50px;
        height: 50px;
    }

    .comment-main-level:after {
        content: '';
        width: 0;
        height: 0;
        display: block;
        clear: both;
    }

    /**
     * Caja del Comentario
     ---------------------------*/
    .comments-list .comment-box {
        width: 500px;
        float: left;
        position: relative;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
    }

    .comments-list .comment-box:before, .comments-list .comment-box:after {
        content: '';
        height: 0;
        width: 0;
        position: absolute;
        display: block;
        border-width: 10px 12px 10px 0;
        border-style: solid;
        border-color: transparent #FCFCFC;
        top: 8px;
        left: -11px;
    }

    .comments-list .comment-box:before {
        border-width: 11px 13px 11px 0;
        border-color: transparent rgba(0, 0, 0, 0.05);
        left: -12px;
    }

    .reply-list .comment-box {
        width: 610px;
    }

    .comment-box .comment-head {
        background: #FCFCFC;
        padding: 10px 12px;
        border-bottom: 1px solid #E5E5E5;
        overflow: hidden;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
    }

    .comment-box .comment-head i {
        float: right;
        margin-left: 14px;
        position: relative;
        top: 2px;
        color: #A6A6A6;
        cursor: pointer;
        -webkit-transition: color 0.3s ease;
        -o-transition: color 0.3s ease;
        transition: color 0.3s ease;
    }

    .comment-box .comment-head i:hover {
        color: #03658c;
    }

    .comment-box .comment-name {
        color: #283035;
        font-size: 14px;
        font-weight: 700;
        float: left;
        margin-right: 10px;
    }

    .comment-box .comment-name a {
        color: #283035;
    }

    .comment-box .comment-head span {
        float: left;
        color: #999;
        font-size: 13px;
        position: relative;
        top: 1px;
    }

    .comment-box .comment-content {
        background: #FFF;
        padding: 12px;
        font-size: 15px;
        color: #595959;
        -webkit-border-radius: 0 0 4px 4px;
        -moz-border-radius: 0 0 4px 4px;
        border-radius: 0 0 4px 4px;
    }

    .comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {
        color: #03658c;
    }

    .comment-box .comment-name.by-author:after {
        content: 'autor';
        background: #03658c;
        color: #FFF;
        font-size: 12px;
        padding: 3px 5px;
        font-weight: 700;
        margin-left: 10px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    /** =====================
     * Responsive
     ========================*/
    @media only screen and (max-width: 766px) {
        .comments-container {
            width: 480px;
        }

        .comments-list .comment-box {
            width: 390px;
        }

        .reply-list .comment-box {
            width: 320px;
        }
    }
</style>












