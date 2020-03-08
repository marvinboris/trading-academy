@extends('layouts.admin')

@section('section', 'CMS')
@section('title', 'Front-end')

@section('content')
@component('components.auth.pages.admin.page')
<form action="{{ route('admin.cms.front-end.post') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach ($languages as $key => $language)
                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="v-pills-{{ $language->lang }}-tab" data-toggle="pill" href="#v-pills-{{ $language->lang }}" role="tab" aria-controls="v-pills-{{ $language->lang }}" aria-selected="true">{{ $language->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-xl-10 col-lg-9 col-md-8">
            <div class="tab-content" id="v-pills-tabContent">
                @foreach ($languages as $langKey => $language)
                <div class="tab-pane fade show {{ $langKey == 0 ? 'active' : '' }}" id="v-pills-{{ $language->lang }}" role="tabpanel" aria-labelledby="v-pills-{{ $language->lang }}-tab">
                    <ul class="nav nav-pills mb-3" id="pills-tab-{{ $language->lang }}" role="tablist">
                        @foreach ($items as $itemKey => $item)
                        <li class="nav-item">
                            <a class="nav-link {{ $itemKey == 'header' ? 'active' : '' }}" id="pills-{{ $language->lang }}-{{ $itemKey }}-tab" data-toggle="pill" href="#pills-{{ $language->lang }}-{{ $itemKey }}" role="tab" aria-controls="pills-{{ $language->lang }}-{{ $itemKey }}" aria-selected="true">{{ $item }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-{{ $language->lang }}-tabContent">
                        <div class="tab-pane fade show active" id="pills-{{ $language->lang }}-header" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-header-tab">
                            <legend>Navigation</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-header-nav-home" class="control-label">Home</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][header][nav][home]" id="{{ $language->lang }}-frontend-header-nav-home" class="form-control" value="{!! $page_content[$language->lang]['frontend']['header']['nav']['home'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-header-nav-courses" class="control-label">Courses</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][header][nav][courses]" id="{{ $language->lang }}-frontend-header-nav-courses" class="form-control" value="{!! $page_content[$language->lang]['frontend']['header']['nav']['courses'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-header-nav-about" class="control-label">About Us</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][header][nav][about]" id="{{ $language->lang }}-frontend-header-nav-about" class="form-control" value="{!! $page_content[$language->lang]['frontend']['header']['nav']['about'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-header-nav-contact" class="control-label">Contact</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][header][nav][contact]" id="{{ $language->lang }}-frontend-header-nav-contact" class="form-control" value="{!! $page_content[$language->lang]['frontend']['header']['nav']['contact'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-header-nav-faq" class="control-label">FAQ</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][header][nav][faq]" id="{{ $language->lang }}-frontend-header-nav-faq" class="form-control" value="{!! $page_content[$language->lang]['frontend']['header']['nav']['faq'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-header-nav-livechat" class="control-label">LiveChat</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][header][nav][livechat]" id="{{ $language->lang }}-frontend-header-nav-livechat" class="form-control" value="{!! $page_content[$language->lang]['frontend']['header']['nav']['livechat'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-header-nav-sign-in" class="control-label">Sign In</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][header][nav][sign_in]" id="{{ $language->lang }}-frontend-header-nav-sign-in" class="form-control" value="{!! $page_content[$language->lang]['frontend']['header']['nav']['sign_in'] !!}" required>
                                </div>
                            </div>

                            <legend>Authentication</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-header-auth-dashboard" class="control-label">Dashboard</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][header][auth][dashboard]" id="{{ $language->lang }}-frontend-header-auth-dashboard" class="form-control" value="{!! $page_content[$language->lang]['frontend']['header']['auth']['dashboard'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-header-auth-logout" class="control-label">logout</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][header][auth][logout]" id="{{ $language->lang }}-frontend-header-auth-logout" class="form-control" value="{!! $page_content[$language->lang]['frontend']['header']['auth']['logout'] !!}" required>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-footer" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-footer-tab">
                            <legend>Address</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-address-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][address][title]" id="{{ $language->lang }}-frontend-footer-address-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['address']['title'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-address-content" class="control-label">Content</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="{{ $language->lang }}[frontend][footer][address][content]" id="{{ $language->lang }}-frontend-footer-address-content" class="form-control summernote">{!! $page_content[$language->lang]['frontend']['footer']['address']['content'] !!}</textarea>
                                </div>
                            </div>
                            
                            <legend>Phone & E-Mail</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-phone_email-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][phone_email][title]" id="{{ $language->lang }}-frontend-footer-phone_email-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['phone_email']['title'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-phone_email-online" class="control-label">Online</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][phone_email][online]" id="{{ $language->lang }}-frontend-footer-phone_email-online" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['phone_email']['online'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-phone_email-email" class="control-label">E-Mail</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][phone_email][email]" id="{{ $language->lang }}-frontend-footer-phone_email-email" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['phone_email']['email'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-phone_email-support" class="control-label">Support</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][phone_email][support]" id="{{ $language->lang }}-frontend-footer-phone_email-support" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['phone_email']['support'] !!}" required>
                                </div>
                            </div>
                            
                            <legend>Partners</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-partners-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][partners][title]" id="{{ $language->lang }}-frontend-footer-partners-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['partners']['title'] !!}" required>
                                </div>
                            </div>
                            
                            <legend>Maps</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-maps-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][maps][title]" id="{{ $language->lang }}-frontend-footer-maps-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['maps']['title'] !!}" required>
                                </div>
                            </div>
                            
                            <legend>Newsletter</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-newsletter-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][newsletter][title]" id="{{ $language->lang }}-frontend-footer-newsletter-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['newsletter']['title'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-newsletter-form-email" class="control-label">E-Mail</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" name="{{ $language->lang }}[frontend][footer][newsletter][form][email]" id="{{ $language->lang }}-frontend-footer-newsletter-form-email" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['newsletter']['form']['email'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-newsletter-form-subscribe" class="control-label">Subscribe</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][newsletter][form][subscribe]" id="{{ $language->lang }}-frontend-footer-newsletter-form-subscribe" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['newsletter']['form']['subscribe'] !!}" required>
                                </div>
                            </div>
                            
                            <legend>Foot</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-footer-foot-text" class="control-label">Text</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="{{ $language->lang }}[frontend][footer][foot][text]" id="{{ $language->lang }}-frontend-footer-foot-text" class="form-control summernote">{!! $page_content[$language->lang]['frontend']['footer']['foot']['text'] !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-home" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-home-tab">
                            <legend>Slider</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-home-slider-sign_up" class="control-label">Sign Up</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][home][slider][sign_up]" id="{{ $language->lang }}-frontend-home-slider-sign_up" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['slider']['sign_up'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-home-slider-read_more" class="control-label">Read More</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][home][slider][read_more]" id="{{ $language->lang }}-frontend-home-slider-read_more" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['slider']['read_more'] !!}" required>
                                </div>
                            </div>

                            @foreach ($page_content[$language->lang]['frontend']['pages']['home']['slider']['content'] as $key => $value)
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <h5 class="font-weight-700">Slider {{ $key + 1 }}</h5>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-slider-content-{{ $key }}-first" class="control-label">Intro</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][slider][content][{{ $key }}][first]" id="{{ $language->lang }}-frontend-home-slider-content-{{ $key }}-first" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['slider']['content'][$key]['first'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-slider-content-{{ $key }}-second" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="{{ $language->lang }}[frontend][pages][home][slider][content][{{ $key }}][second]" id="{{ $language->lang }}-frontend-home-slider-content-{{ $key }}-second" class="form-control summernote" required>{!! $page_content[$language->lang]['frontend']['pages']['home']['slider']['content'][$key]['second'] !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-slider-content-{{ $key }}-third" class="control-label">Subtitle</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="{{ $language->lang }}[frontend][pages][home][slider][content][{{ $key }}][third]" id="{{ $language->lang }}-frontend-home-slider-content-{{ $key }}-third" class="form-control summernote" required>{!! $page_content[$language->lang]['frontend']['pages']['home']['slider']['content'][$key]['third'] !!}</textarea>
                                        </div>
                                    </div>
                                    @if ($language->lang == 'en')
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-slider-content-{{ $key }}-img" class="control-label">Picture</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="{{ $language->lang }}[frontend][pages][home][slider][content][{{ $key }}][img]" id="{{ $language->lang }}-frontend-home-slider-content-{{ $key }}-img">
                                                <label class="custom-file-label" for="{{ $language->lang }}-frontend-home-slider-content-{{ $key }}-img">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <img src="{{ asset($page_content[$language->lang]['frontend']['pages']['home']['slider']['content'][$key]['img']) }}" alt="" class="img-fluid img-thumbnail">
                                </div>
                            </div>    
                            @endforeach
                            
                            <legend>Presentation</legend>
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-presentation-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][presentation][title]" id="{{ $language->lang }}-frontend-home-presentation-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['presentation']['title'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-presentation-description" class="control-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="{{ $language->lang }}[frontend][pages][home][presentation][description]" id="{{ $language->lang }}-frontend-home-presentation-description" class="form-control summernote" required>{!! $page_content[$language->lang]['frontend']['pages']['home']['presentation']['description'] !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-presentation-play_video" class="control-label">Play Video</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][presentation][play_video]" id="{{ $language->lang }}-frontend-home-presentation-play_video" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['presentation']['play_video'] !!}" required>
                                        </div>
                                    </div>
                                    @if ($language->lang == 'en')
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-presentation-first_pic" class="control-label">First Picture</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="{{ $language->lang }}[frontend][pages][home][presentation][first_pic]" id="{{ $language->lang }}-frontend-home-presentation-first_pic">
                                                <label class="custom-file-label" for="{{ $language->lang }}-frontend-home-presentation-first_pic">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-presentation-second_pic" class="control-label">Second Picture</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="{{ $language->lang }}[frontend][pages][home][presentation][second_pic]" id="{{ $language->lang }}-frontend-home-presentation-second_pic">
                                                <label class="custom-file-label" for="{{ $language->lang }}-frontend-home-presentation-second_pic">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset($page_content[$language->lang]['frontend']['pages']['home']['presentation']['first_pic']) }}" alt="First Picture" class="img-fluid img-thumbnail mb-3">
                                    <img src="{{ asset($page_content[$language->lang]['frontend']['pages']['home']['presentation']['second_pic']) }}" alt="Second Picture" class="img-fluid img-thumbnail">
                                </div>
                            </div>
                            
                            <legend>Level Courses</legend>
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-level_courses-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][level_courses][title]" id="{{ $language->lang }}-frontend-home-level_courses-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['level_courses']['title'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-level_courses-description" class="control-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="{{ $language->lang }}[frontend][pages][home][level_courses][description]" id="{{ $language->lang }}-frontend-home-level_courses-description" class="form-control summernote" required>{!! $page_content[$language->lang]['frontend']['pages']['home']['level_courses']['description'] !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-level_courses-enroll_now" class="control-label">Enroll Now</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][level_courses][enroll_now]" id="{{ $language->lang }}-frontend-home-level_courses-enroll_now" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['level_courses']['enroll_now'] !!}" required>
                                        </div>
                                    </div>
                                    @if ($language->lang == 'en')
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-level_courses-polygon" class="control-label">Polygon Background</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="{{ $language->lang }}[frontend][pages][home][level_courses][polygon]" id="{{ $language->lang }}-frontend-home-level_courses-polygon">
                                                <label class="custom-file-label" for="{{ $language->lang }}-frontend-home-level_courses-polygon">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset($page_content[$language->lang]['frontend']['pages']['home']['level_courses']['polygon']) }}" alt="First Picture" class="img-fluid img-thumbnail">
                                </div>
                            </div>
                            
                            <legend>Stats</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-statics-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][statics][title]" id="{{ $language->lang }}-frontend-home-statics-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['statics']['title'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-statics-course" class="control-label">Courses</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][statics][course]" id="{{ $language->lang }}-frontend-home-statics-course" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['statics']['course'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-statics-enrolled" class="control-label">Enroll Now</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][statics][enrolled]" id="{{ $language->lang }}-frontend-home-statics-enrolled" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['statics']['enrolled'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-statics-certified" class="control-label">Certified</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][statics][certified]" id="{{ $language->lang }}-frontend-home-statics-certified" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['statics']['certified'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-statics-trainer" class="control-label">Trainers</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][statics][trainer]" id="{{ $language->lang }}-frontend-home-statics-trainer" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['statics']['trainer'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <legend>Testimonials</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-testimonial-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][testimonial][title]" id="{{ $language->lang }}-frontend-home-testimonial-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['testimonial']['title'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-testimonial-description" class="control-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="{{ $language->lang }}[frontend][pages][home][testimonial][description]" id="{{ $language->lang }}-frontend-home-testimonial-description" class="form-control summernote" required>{!! $page_content[$language->lang]['frontend']['pages']['home']['testimonial']['description'] !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-testimonial-full_list" class="control-label">Full List</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][testimonial][full_list]" id="{{ $language->lang }}-frontend-home-testimonial-full_list" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['testimonial']['full_list'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <legend>Blog</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-blog-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][home][blog][title]" id="{{ $language->lang }}-frontend-home-blog-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['home']['blog']['title'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-home-blog-description" class="control-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="{{ $language->lang }}[frontend][pages][home][blog][description]" id="{{ $language->lang }}-frontend-home-blog-description" class="form-control summernote" required>{!! $page_content[$language->lang]['frontend']['pages']['home']['blog']['description'] !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 offset-xl-2 offset-lg-3 offset-md-4">
                    <button class="btn btn-green">Save <i class="fas fa-arrow-circle-right ml-2"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection