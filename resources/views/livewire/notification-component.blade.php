<div wire:poll>
    <span>{{ $notificationcount }} New Notifications <a wire:click.prevent="makeNotificationRead" title="" class="btn btn-success">Make it Read</a></span>
						<ul class="drops-menu">
                            @foreach ($notification as $item)


							<li>
								<a href="notifications.html" title="">
									<img src="{{ $item->user->profile_photo_path }}" alt="">
									<div class="mesg-meta">
										<h6>{{ $item->user->name }}</h6>
										<span>{{ $item->brif }}</span>
										<i>{{ $item->created_at }}</i>
									</div>
								</a>
                                @if ($item->read=='no')

                                <span class="tag blue">Unseen</span>

                                @elseif ($item->read=='no')
								<span class="tag green">seen</span>



                                @endif
							</li>
                             @endforeach
							{{-- <li>
								<a href="notifications.html" title="">
									<img src="{{ asset('user/images/resources/thumb-2.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Jhon doe</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag red">Reply</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="{{ asset('user/images/resources/thumb-3.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Andrew</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag blue">Unseen</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="{{ asset('user/images/resources/thumb-4.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Tom cruse</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="{{ asset('user/images/resources/thumb-5.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Amy</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li> --}}
						</ul>

</div>
