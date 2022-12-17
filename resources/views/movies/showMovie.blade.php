<x-front-layout>
    @if (!empty($movie))
        <main class="my-2">
            <section class="bg-gradient-to-r from-indigo-700 to-transparent">
                <div class="max-w-6xl mx-auto m-4 p-2">
                    <div class="flex">
                        <div class="w-3/12">
                            <div class="w-full">
                                <img class="w-full h-full rounded"
                                    src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $movie->poster_path }}">
                            </div>
                        </div>
                        <div class="w-8/12">
                            <div class="m-4 p-6">
                                <h1 class="flex text-white font-bold text-4xl">{{ $movie->title }}</h1>
                                <div class="flex p-3 text-white space-x-4">
                                    <span>{{ $movie->release_date }}</span>
                                    <span class="ml-2 space-x-1">
                                        @foreach ($movie->genres as $genre)
                                            <a class="font-bold hover:text-blue-500"
                                                href="{{ route('genres.show', $genre->slug) }}">
                                                {{ $genre->title }},
                                            </a>
                                        @endforeach
                                    </span>
                                    <span class="ml-2 space-x-1">
                                        @foreach ($movie->genres as $genre)
                                            <a class="font-bold hover:text-blue-500"
                                                href="{{ route('genres.show', $genre->slug) }}">
                                                Watch Movie
                                            </a>
                                        @endforeach
                                    </span>

                                </div>

                                <div class="flex space-x-4">

                                        <!-- Livewire Component wire-end:jp6TAhIuHOnvY7mGKPqe -->
                                    @foreach ($movie->trailers as $trailer)
                                    @endforeach
                                    <div wire:id="jp6TAhIuHOnvY7mGKPqe"
                                    wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;jp6TAhIuHOnvY7mGKPqe&quot;,&quot;name&quot;:&quot;movie-trailer&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;movies\/avatar-the-way-of-water&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;56b8d466&quot;,&quot;data&quot;:{&quot;showMovieEmbedModal&quot;:false,&quot;trailer&quot;:[]},&quot;dataMeta&quot;:{&quot;models&quot;:{&quot;trailer&quot;:{&quot;class&quot;:&quot;App\\Models\\TrailerUrl&quot;,&quot;id&quot;:1,&quot;relations&quot;:[],&quot;connection&quot;:&quot;mysql&quot;}}},&quot;checksum&quot;:&quot;9637eb2d3f14a66e17c14d164ceca144245f9337329b8687593bb4783fe19aed&quot;}}">
                                    <button

                                    </button>
                                </div>

                                </div>

                            </div>
                            <div class="p-8 text-white">
                                <p>{{ $movie->overview }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="max-w-6xl mx-auto bg-gray-200 dark:bg-gray-900 p-2 rounded">
                <div class="flex justify-between">
                    <div class="w-7/12">
                        <h1 class="flex text-white font-bold text-xl">Watch Movie</h1>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-4">
                            {!! $trailer->embed_html ?? null !!}
                        </div>
                    </div>

                </div>
            </section>
            <section class="max-w-6xl mx-auto bg-gray-200 dark:bg-gray-900 p-2 rounded">
                <div class="flex justify-between">
                    <div class="w-7/12">
                        <h1 class="flex text-white font-bold text-xl">Movie Casts</h1>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-4">
                            @foreach ($movie->casts as $cast)
                                <x-movie-card>
                                    <x-slot name="image">
                                        <a href="{{ route('casts.show', $cast->slug) }}">
                                            <img class=""
                                                src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $cast->poster_path }}">
                                        </a>
                                    </x-slot>
                                    <a href="{{ route('casts.show', $cast->slug) }}">
                                        <span class="text-white">{{ $cast->name }}</span>
                                    </a>
                                </x-movie-card>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-4/12">
                        <h1 class="flex text-white font-bold text-xl">Latest movies</h1>
                        <div class="grid grid-cols-3 gap-2">
                            @if (!empty($latest))

                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <div class="comments-container">
                <h1>User Comments</h1>

                <ul id="comments-list" class="comments-list">
                    <li>
                        <div class="comment-main-level">
                            <!-- Avatar -->
                            <div class="comment-avatar"><img src="http://dummyimage.com/60" alt=""></div>
                            <!-- Contenedor del Comentario -->
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name by-author"><a href="#">User Name</a></h6>
                                    <span class="posted-time">Posted on 10-FEB-2015 12:00</span>
                                    <i class="fa fa-reply"></i>
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="comment-content">

                                    <div class="comment-open">
                                        <a class="btn-reply">
                                            <i class="fa fa-reply"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="comment-footer">
                                    <div class="comment-form">
                                        <textarea class="form-control" name="" id=""></textarea>
                                        <div class="pull-right send-button">
                                            <a class="btn-send">send</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="comments-list reply-list">
                            <li>

                                <div class="comment-avatar"><img src="http://dummyimage.com/60" alt=""></div>

                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name"><a href="#">Lorena Rojero</a></h6>
                                        <span class="posted-time">Posted on DD-MM-YYYY HH:MM</span>
                                        <i class="fa fa-reply"></i>
                                        <i class="fa fa-heart"></i>
                                    </div>
                                    <div class="comment-content">

                                        <div class="comment-open">
                                            Nice
                                            <a class="btn-reply">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comment-footer">
                                    <div class="comment-form">
                                        <textarea class="form-control" name="" id=""></textarea>
                                        <div class="pull-right send-button">
                                            <a class="btn-send">send</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </li>

                            <li>

                                <div class="comment-avatar"><img src="http://dummyimage.com/60" alt=""></div>

                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name by-author"><a href="#">User Name</a></h6>
                                        <span class="posted-time">Posted on DD-MM-YYYY HH:MM</span>
                                        <i class="fa fa-reply"></i>
                                        <i class="fa fa-heart"></i>
                                    </div>
                                    <div class="comment-content">

                                        <div class="comment-open">
                                            Very Good
                                            <a class="btn-reply">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comment-footer">
                                    <div class="comment-form">
                                        <textarea class="form-control" name="" id=""></textarea>
                                        <div class="pull-right send-button">
                                            <a class="btn-send">send</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <div class="comment-main-level">

                            <div class="comment-avatar"><img src="http://dummyimage.com/60" alt=""></div>

                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name"><a href="#">Lorena Rojero</a></h6>
                                    <span class="posted-time">Posted on DD-MM-YYYY HH:MM</span>
                                    <i class="fa fa-reply"></i>
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="comment-content">

                                    <div class="comment-open">
                                        Awesome
                                        <a class="btn-reply">
                                            <i class="fa fa-reply"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="comment-footer">
                                    <div class="comment-form">
                                        <textarea class="form-control" name="" id=""></textarea>
                                        <div class="pull-right send-button">
                                            <a class="btn-send">send</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
<style>

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

	.reply-list:before, .reply-list:after {display: none;}
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
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
		-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
		box-shadow: 0 1px 2px rgba(0,0,0,0.2);
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

	.comments-list .comment-box {
		width: 680px;
		float: right;
		position: relative;
		-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
		-moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
		box-shadow: 0 1px 1px rgba(0,0,0,0.15);
		background-color: #FFF;
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
		border-color: transparent rgba(0,0,0,0.05);
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
		-webkit-border-radius: 0 0 0px 0px;
		-moz-border-radius: 0 0 0px 0px;
		border-radius: 0 0 0px 0px;
		border-bottom: .5px solid #e5e5e5;
	}

	.comment-box .comment-footer {
		border-radius: 0 0 4px 4px;
		padding: 12px;
		width: 100%;
		background: #fff none repeat scroll 0 0;
	}
	.comment-box .comment-footer textarea {
		resize: none;
		width: 100%;
		border-radius: 4px;
		padding: 1%;
	}
	.comment-box .send-button, .comment-box .comment-open {
		padding: 12px;
		background: #fff none repeat scroll 0 0;
	}
	.comment-box .send-button .btn-send, .comment-box .comment-open .btn-send {
		background-color: #03658c;
	    border-color: #03658c;
	    color: #fff;
	    padding: 6px 12px;
	    text-align: center;
	    vertical-align: middle;
	    cursor: pointer;
	}
	.comment-box .send-button .btn-send, .comment-box .comment-open .btn-send {
		text-decoration: none;
	}
	.comment-box .btn-reply {
		cursor: pointer;
	}
	.comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
	.comment-box .comment-name.by-author:after {
		/*content: '';*/
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
	.comment-box .posted-time {
		margin-top: 8px;
	}

	.comment-box .comment-footer {
		display: none;
	}
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

<script>
    		$(document).on('click', '.btn-reply', function(eve){
			eve.preventDefault();
			$(this).parent().parent().siblings('.comment-footer').slideToggle();
			eve.stopImmediatePropagation();
			console.log($(this));
		});

		$(document).on('click', '.btn-send', function(eve){
			var targetObject = $(this).parent().parent().parent().parent().parent();
			//console.log(targetObject);
			var reply_text = $(this).parent().siblings('textarea').val();

			if($.trim(reply_text) == " " || $.trim(reply_text) == ""){
				alert("insert comment");
			} else {
			if($(targetObject).hasClass("comment-main-level"))
				{
					if($(targetObject).siblings('.comments-list.reply-list')) {
						element_prepend = '<li> <div class="comment-avatar"><img alt="" src="http://dummyimage.com/60"></div><div class="comment-box"> <div class="comment-head"> <h6 class="comment-name"><a href="#">Lorena Rojero</a></h6> <span class="posted-time">Posted on DD-MM-YYYY HH:MM</span> <i class="fa fa-reply"></i> <i class="fa fa-heart"></i> </div> <div class="comment-content">'+ reply_text +' <div class="comment-open"> <a class="btn-reply"> <i class="fa fa-reply"></i> </a> </div> </div> <div class="comment-footer"> <div class="comment-form"> <textarea id="" name="" class="form-control"></textarea> <div class="pull-right send-button"> <a class="btn-send">send</a> </div> </div> </div> </div> </li>';
						 $(targetObject).siblings('.comments-list.reply-list').prepend(element_prepend);
					}
				}
			}
		});
</script>
            @if (count($movie->tags) > 0)
                <section class="max-w-6xl mx-auto bg-gradient-to-r from-indigo-700 to-transparent mt-6 p-2">
                    @foreach ($movie->tags as $tag)
                        <span
                            class="font-bold text-white hover:text-indigo-200 cursor-pointer">#{{ $tag->tag_name }}</span>
                    @endforeach
                </section>
            @endif
        </main>
    @endif

</x-front-layout>
