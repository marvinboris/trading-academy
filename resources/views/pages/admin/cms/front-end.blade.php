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
                                    <label for="{{ $language->lang }}-frontend-header-auth-logout" class="control-label">Logout</label>
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
                                    <input type="text" name="{{ $language->lang }}[frontend][footer][newsletter][form][email]" id="{{ $language->lang }}-frontend-footer-newsletter-form-email" class="form-control" value="{!! $page_content[$language->lang]['frontend']['footer']['newsletter']['form']['email'] !!}" required>
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

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-about" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-about-tab">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-about-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][about][title]" id="{{ $language->lang }}-frontend-about-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['about']['title'] !!}" required>
                                </div>
                            </div>

                            <legend>About</legend>
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-about-about-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][about][about][title]" id="{{ $language->lang }}-frontend-about-about-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['about']['about']['title'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-about-about-description" class="control-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="{{ $language->lang }}[frontend][pages][about][about][description]" id="{{ $language->lang }}-frontend-about-about-description" class="form-control summernote" required>{!! $page_content[$language->lang]['frontend']['pages']['about']['about']['description'] !!}</textarea>
                                        </div>
                                    </div>
                                    @if ($language->lang == 'en')
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-about-about-img" class="control-label">Picture</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="{{ $language->lang }}[frontend][pages][about][about][img]" id="{{ $language->lang }}-frontend-about-about-img">
                                                <label class="custom-file-label" for="{{ $language->lang }}-frontend-about-about-img">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset($page_content[$language->lang]['frontend']['pages']['about']['about']['img']) }}" alt="First Picture" class="img-fluid img-thumbnail">
                                </div>
                            </div>

                            <legend>Mission</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-about-mission-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][about][mission][title]" id="{{ $language->lang }}-frontend-about-mission-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['about']['mission']['title'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-about-mission-description" class="control-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="{{ $language->lang }}[frontend][pages][about][mission][description]" id="{{ $language->lang }}-frontend-about-mission-description" class="form-control summernote" required>{!! $page_content[$language->lang]['frontend']['pages']['about']['mission']['description'] !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <legend>Trainers</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-about-trainers-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][about][trainers][title]" id="{{ $language->lang }}-frontend-about-trainers-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['about']['trainers']['title'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-about-trainers-description" class="control-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="{{ $language->lang }}[frontend][pages][about][trainers][description]" id="{{ $language->lang }}-frontend-about-trainers-description" class="form-control summernote" required>{!! $page_content[$language->lang]['frontend']['pages']['about']['trainers']['description'] !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-courses" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-courses-tab">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-courses-what_you_will_learn" class="control-label">What You Will Learn</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][courses][what_you_will_learn]" id="{{ $language->lang }}-frontend-courses-what_you_will_learn" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['courses']['what_you_will_learn'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-courses-course_content" class="control-label">Course Content</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][courses][course_content]" id="{{ $language->lang }}-frontend-courses-course_content" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['courses']['course_content'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-courses-requirements" class="control-label">Requirements</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][courses][requirements]" id="{{ $language->lang }}-frontend-courses-requirements" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['courses']['requirements'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-courses-description" class="control-label">Description</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][courses][description]" id="{{ $language->lang }}-frontend-courses-description" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['courses']['description'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-courses-reviews" class="control-label">Reviews</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][courses][reviews]" id="{{ $language->lang }}-frontend-courses-reviews" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['courses']['reviews'] !!}" required>
                                </div>
                            </div>

                            <legend>Course Box</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-courses-box-includes" class="control-label">Includes</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][courses][box][includes]" id="{{ $language->lang }}-frontend-courses-box-includes" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['courses']['box']['includes'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-courses-box-certificate_guaranteed" class="control-label">Guaranteed Certificate</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][courses][box][certificate_guaranteed]" id="{{ $language->lang }}-frontend-courses-box-certificate_guaranteed" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['courses']['box']['certificate_guaranteed'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-courses-box-enroll_now" class="control-label">Enroll Now</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][courses][box][enroll_now]" id="{{ $language->lang }}-frontend-courses-box-enroll_now" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['courses']['box']['enroll_now'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-contact" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-contact-tab">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-contact-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][contact][title]" id="{{ $language->lang }}-frontend-contact-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['contact']['title'] !!}" required>
                                </div>
                            </div>

                            <legend>Contact Information</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-contact-contact_info-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][contact][contact_info][title]" id="{{ $language->lang }}-frontend-contact-contact_info-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['contact']['contact_info']['title'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <legend>Message Us</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-contact-message_us-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][contact][message_us][title]" id="{{ $language->lang }}-frontend-contact-message_us-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['contact']['message_us']['title'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-contact-message_us-form-name" class="control-label">Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][contact][message_us][form][name]" id="{{ $language->lang }}-frontend-contact-message_us-form-name" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['contact']['message_us']['form']['name'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-contact-message_us-form-email" class="control-label">E-Mail</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][contact][message_us][form][email]" id="{{ $language->lang }}-frontend-contact-message_us-form-email" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['contact']['message_us']['form']['email'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-contact-message_us-form-subject" class="control-label">Subject</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][contact][message_us][form][subject]" id="{{ $language->lang }}-frontend-contact-message_us-form-subject" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['contact']['message_us']['form']['subject'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-contact-message_us-form-message" class="control-label">Message</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][contact][message_us][form][message]" id="{{ $language->lang }}-frontend-contact-message_us-form-message" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['contact']['message_us']['form']['message'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-contact-message_us-form-submit" class="control-label">Submit</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][contact][message_us][form][submit]" id="{{ $language->lang }}-frontend-contact-message_us-form-submit" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['contact']['message_us']['form']['submit'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-blog" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-blog-tab">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-blog-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][blog][title]" id="{{ $language->lang }}-frontend-blog-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['blog']['title'] !!}" required>
                                </div>
                            </div>

                            <legend>Blog</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-blog-blog-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][blog][blog][title]" id="{{ $language->lang }}-frontend-blog-blog-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['blog']['blog']['title'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-blog-blog-description" class="control-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][blog][blog][description]" id="{{ $language->lang }}-frontend-blog-blog-description" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['blog']['blog']['description'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-faq" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-faq-tab">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-faq-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][faq][title]" id="{{ $language->lang }}-frontend-faq-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['faq']['title'] !!}" required>
                                </div>
                            </div>

                            <legend>Content</legend>
                            @foreach ($page_content[$language->lang]['frontend']['pages']['faq']['content'] as $key => $value)
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h5 class="font-weight-700">
                                        <label class="section-number">Section {{ $key + 1 }}</label>
                                        <button type="button" class="btn btn-transparent p-0 text-blue ml-1 add section"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-plus fa-stack-1x fa-inverse"></i></span></button>
                                        <button type="button" class="btn btn-transparent p-0 text-purered delete section"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-minus fa-stack-1x fa-inverse"></i></span></button>
                                    </h5>
                                    <div class="form-group row section-title" prefix-id="{{ $language->lang }}-frontend-faq-content-" prefix-name="{{ $language->lang }}[frontend][pages][faq][content][">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-faq-content-{{ $key }}-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][faq][content][{{ $key }}][title]" id="{{ $language->lang }}-frontend-faq-content-{{ $key }}-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['faq']['content'][$key]['title'] !!}" required>
                                        </div>
                                    </div>

                                    @foreach ($value['content'] as $itemKey => $item)
                                    <div class="item" prefix-id="{{ $language->lang }}-frontend-faq-content-{{ $key }}-content-" prefix-name="{{ $language->lang }}[frontend][pages][faq][content][{{ $key }}][content][">
                                        <h5>
                                            <label class="item-number">Item {{ $itemKey + 1 }}</label>
                                            <button type="button" class="btn btn-transparent p-0 text-blue ml-1 add item"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-plus fa-stack-1x fa-inverse"></i></span></button>
                                            <button type="button" class="btn btn-transparent p-0 text-purered delete item"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-minus fa-stack-1x fa-inverse"></i></span></button>
                                        </h5>
                                        <div class="form-group row item-title" section-suffix-id="-content-{{ $itemKey }}-title" section-suffix-name="][content][{{ $itemKey }}][title]">
                                            <div class="col-md-3">
                                                <label for="{{ $language->lang }}-frontend-faq-content-{{ $key }}-content-{{ $itemKey }}-title" class="control-label">Title</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="{{ $language->lang }}[frontend][pages][faq][content][{{ $key }}][content][{{ $itemKey }}][title]" id="{{ $language->lang }}-frontend-faq-content-{{ $key }}-content-{{ $itemKey }}-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['faq']['content'][$key]['content'][$itemKey]['title'] !!}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row item-content" section-suffix-id="-content-{{ $itemKey }}-body" section-suffix-name="][content][{{ $itemKey }}][body]">
                                            <div class="col-md-3">
                                                <label for="{{ $language->lang }}-frontend-faq-content-{{ $key }}-content-{{ $itemKey }}-body" class="control-label">Body</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea required class="form-control" name="{{ $language->lang }}[frontend][pages][faq][content][{{ $key }}][content][{{ $itemKey }}][body]" id="{{ $language->lang }}-frontend-faq-content-{{ $key }}-content-{{ $itemKey }}-body">
                                                    {!! $page_content[$language->lang]['frontend']['pages']['faq']['content'][$key]['content'][$itemKey]['body'] !!}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>    
                            @endforeach
                        </div>

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-post" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-post-tab">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-post-title" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][post][title]" id="{{ $language->lang }}-frontend-post-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['post']['title'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-post-by" class="control-label">By</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][post][by]" id="{{ $language->lang }}-frontend-post-by" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['post']['by'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-post-posted_on" class="control-label">Posted On</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][post][posted_on]" id="{{ $language->lang }}-frontend-post-posted_on" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['post']['posted_on'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-post-leave_comment" class="control-label">Leave Comment</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][post][leave_comment]" id="{{ $language->lang }}-frontend-post-leave_comment" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['post']['leave_comment'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-post-submit" class="control-label">Submit</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][post][submit]" id="{{ $language->lang }}-frontend-post-submit" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['post']['submit'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-post-search" class="control-label">Search</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][post][search]" id="{{ $language->lang }}-frontend-post-search" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['post']['search'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-post-search_for" class="control-label">Search For</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][post][search_for]" id="{{ $language->lang }}-frontend-post-search_for" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['post']['search_for'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-post-go" class="control-label">Go</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][post][go]" id="{{ $language->lang }}-frontend-post-go" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['post']['go'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-frontend-post-latest_posts" class="control-label">Latest Posts</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[frontend][pages][post][latest_posts]" id="{{ $language->lang }}-frontend-post-latest_posts" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['post']['latest_posts'] !!}" required>
                                </div>
                            </div>
                            
                        </div>

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-sign_in" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-sign_in-tab">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_in-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_in][title]" id="{{ $language->lang }}-frontend-sign_in-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_in']['title'] !!}" required>
                                        </div>
                                    </div>
                                    @if ($language->lang == 'en')
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_in-img" class="control-label">Picture</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="{{ $language->lang }}[frontend][pages][sign_in][img]" id="{{ $language->lang }}-frontend-sign_in-img">
                                                <label class="custom-file-label" for="{{ $language->lang }}-frontend-sign_in-img">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <img src="{!! asset($page_content[$language->lang]['frontend']['pages']['sign_in']['img']) !!}" alt="Picture" class="img-fluid img-thumbnail bg-white-10">
                                </div>
                            </div>

                            <legend>Form</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_in-form-email" class="control-label">E-Mail</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_in][form][email]" id="{{ $language->lang }}-frontend-sign_in-form-email" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_in']['form']['email'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_in-form-password" class="control-label">Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_in][form][password]" id="{{ $language->lang }}-frontend-sign_in-form-password" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_in']['form']['password'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_in-form-remember" class="control-label">Remember</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_in][form][remember]" id="{{ $language->lang }}-frontend-sign_in-form-remember" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_in']['form']['remember'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_in-form-sign_in" class="control-label">Sign In</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_in][form][sign_in]" id="{{ $language->lang }}-frontend-sign_in-form-sign_in" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_in']['form']['sign_in'] !!}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_in-form-text-forgot" class="control-label">Forgot</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_in][form][text][forgot]" id="{{ $language->lang }}-frontend-sign_in-form-text-forgot" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_in']['form']['text']['forgot'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_in-form-text-have" class="control-label">Have No Account</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_in][form][text][have]" id="{{ $language->lang }}-frontend-sign_in-form-text-have" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_in']['form']['text']['have'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_in-form-text-sign_up" class="control-label">Sign Up</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_in][form][text][sign_up]" id="{{ $language->lang }}-frontend-sign_in-form-text-sign_up" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_in']['form']['text']['sign_up'] !!}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="pills-{{ $language->lang }}-sign_up" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-sign_up-tab">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-title" class="control-label">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][title]" id="{{ $language->lang }}-frontend-sign_up-title" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['title'] !!}" required>
                                        </div>
                                    </div>
                                    @if ($language->lang == 'en')
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-img" class="control-label">Picture</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="{{ $language->lang }}[frontend][pages][sign_up][img]" id="{{ $language->lang }}-frontend-sign_up-img">
                                                <label class="custom-file-label" for="{{ $language->lang }}-frontend-sign_up-img">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <img src="{!! asset($page_content[$language->lang]['frontend']['pages']['sign_up']['img']) !!}" alt="Picture" class="img-fluid img-thumbnail bg-white-10">
                                </div>
                            </div>

                            <legend>Form</legend>
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-first_name" class="control-label">First Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][first_name]" id="{{ $language->lang }}-frontend-sign_up-form-first_name" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['first_name'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-last_name" class="control-label">Last Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][last_name]" id="{{ $language->lang }}-frontend-sign_up-form-last_name" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['last_name'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-phone" class="control-label">Phone</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][phone]" id="{{ $language->lang }}-frontend-sign_up-form-phone" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['phone'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-email" class="control-label">E-Mail</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][email]" id="{{ $language->lang }}-frontend-sign_up-form-email" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['email'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-sponsor" class="control-label">Sponsor</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][sponsor]" id="{{ $language->lang }}-frontend-sign_up-form-sponsor" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['sponsor'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-country" class="control-label">Country</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][country]" id="{{ $language->lang }}-frontend-sign_up-form-country" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['country'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-password" class="control-label">Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][password]" id="{{ $language->lang }}-frontend-sign_up-form-password" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['password'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-password_confirmation" class="control-label">Password Confirmation</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][password_confirmation]" id="{{ $language->lang }}-frontend-sign_up-form-password_confirmation" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['password_confirmation'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-terms" class="control-label">Terms</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][terms]" id="{{ $language->lang }}-frontend-sign_up-form-terms" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['terms'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-register" class="control-label">Register</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][register]" id="{{ $language->lang }}-frontend-sign_up-form-register" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['register'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-sign_in" class="control-label">Sign In</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][sign_in]" id="{{ $language->lang }}-frontend-sign_up-form-sign_in" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['sign_in'] !!}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-password_block-uppercase" class="control-label">Uppercase</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][password_block][uppercase]" id="{{ $language->lang }}-frontend-sign_up-form-password_block-uppercase" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['password_block']['uppercase'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-password_block-lowercase" class="control-label">Lowercase</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][password_block][lowercase]" id="{{ $language->lang }}-frontend-sign_up-form-password_block-lowercase" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['password_block']['lowercase'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-password_block-number" class="control-label">Number</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][password_block][number]" id="{{ $language->lang }}-frontend-sign_up-form-password_block-number" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['password_block']['number'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-password_block-special" class="control-label">Special</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][password_block][special]" id="{{ $language->lang }}-frontend-sign_up-form-password_block-special" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['password_block']['special'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-password_block-minimum" class="control-label">Minimum</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][password_block][minimum]" id="{{ $language->lang }}-frontend-sign_up-form-password_block-minimum" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['password_block']['minimum'] !!}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="{{ $language->lang }}-frontend-sign_up-form-password_block-confirm" class="control-label">Confirm</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="{{ $language->lang }}[frontend][pages][sign_up][form][password_block][confirm]" id="{{ $language->lang }}-frontend-sign_up-form-password_block-confirm" class="form-control" value="{!! $page_content[$language->lang]['frontend']['pages']['sign_up']['form']['password_block']['confirm'] !!}" required>
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
                    <button type="submit" class="btn btn-green">Save <i class="fas fa-arrow-circle-right ml-2"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection

@section('scripts')
    <script>
        $(function () {
            const deleteBtnEvent = function () {
                const current = $(this);
                current.parent().parent().remove();

                if (current.hasClass('section')) {
                    const sections = current.parent().parent().parent().children('.col-12');
                    sections.each(function (sectionIndex) {
                        const section = $(this);
                        section.find('label.section-number').html('Section ' + (sectionIndex + 1));

                        const sectionTitle = section.find('.section-title');
                        const prefixId = sectionTitle.attr('prefix-id');
                        const prefixName = sectionTitle.attr('prefix-name');

                        const sectionTitleId = prefixId + sectionIndex + '-title';
                        const sectionTitleName = prefixName + sectionIndex + '][title]';
                        sectionTitle.find('label').attr('for', sectionTitleId);
                        sectionTitle.find('input').attr('id', sectionTitleId).attr('name', sectionTitleName);

                        const items = section.children('.item');

                        items.each(function (itemIndex) {
                            const item = $(this);

                            const itemTitle = item.find('.item-title');
                            const titleSectionSuffixId = itemTitle.attr('section-suffix-id');
                            const titleSectionSuffixName = itemTitle.attr('section-suffix-name');

                            const itemTitleId = prefixId + sectionIndex + titleSectionSuffixId;
                            const itemTitleName = prefixName + sectionIndex + titleSectionSuffixName;
                            itemTitle.find('label').attr('for', itemTitleId);
                            itemTitle.find('input').attr('id', itemTitleId).attr('name', itemTitleName);

                            const itemContent = item.find('.item-content');
                            const contentSectionSuffixId = itemContent.attr('section-suffix-id');
                            const contentSectionSuffixName = itemContent.attr('section-suffix-name');

                            const itemContentId = prefixId + sectionIndex + contentSectionSuffixId;
                            const itemContentName = prefixName + sectionIndex + contentSectionSuffixName;
                            itemContent.find('label').attr('for', itemContentId);
                            itemContent.find('textarea').attr('id', itemContentId).attr('name', itemContentName);
                        });
                    });
                }
            };
            const addBtnEvent = function () {
                const current = $(this);
                const clone = current.parent().parent().clone();
                
                current.parent().parent().after(clone);
                clone.find('.btn.delete').click(deleteBtnEvent);
                clone.find('.btn.add').click(addBtnEvent);

                if (current.hasClass('section')) {
                    const sections = current.parent().parent().parent().children('.col-12');
                    sections.each(function (sectionIndex) {
                        const section = $(this);
                        section.find('label.section-number').html('Section ' + (sectionIndex + 1));

                        const sectionTitle = section.find('.section-title');
                        const prefixId = sectionTitle.attr('prefix-id');
                        const prefixName = sectionTitle.attr('prefix-name');

                        const sectionTitleId = prefixId + sectionIndex + '-title';
                        const sectionTitleName = prefixName + sectionIndex + '][title]';
                        sectionTitle.find('label').attr('for', sectionTitleId);
                        sectionTitle.find('textarea').attr('id', sectionTitleId).attr('name', sectionTitleName);

                        const items = section.children('.item');

                        items.each(function (itemIndex) {
                            const item = $(this);

                            const itemTitle = item.find('.item-title');
                            const titleSectionSuffixId = itemTitle.attr('section-suffix-id');
                            const titleSectionSuffixName = itemTitle.attr('section-suffix-name');

                            const itemTitleId = prefixId + sectionIndex + titleSectionSuffixId;
                            const itemTitleName = prefixName + sectionIndex + titleSectionSuffixName;
                            itemTitle.find('label').attr('for', itemTitleId);
                            itemTitle.find('input').attr('id', itemTitleId).attr('name', itemTitleName);

                            const itemContent = item.find('.item-content');
                            const contentSectionSuffixId = itemContent.attr('section-suffix-id');
                            const contentSectionSuffixName = itemContent.attr('section-suffix-name');

                            const itemContentId = prefixId + sectionIndex + contentSectionSuffixId;
                            const itemContentName = prefixName + sectionIndex + contentSectionSuffixName;
                            itemContent.find('label').attr('for', itemContentId);
                            itemContent.find('textarea').attr('id', itemContentId).attr('name', itemContentName);
                        });
                    });
                }

                if (current.hasClass('item')) {
                    const items = current.parent().parent().parent().children('.item');

                    items.each(function (itemIndex) {
                        const item = $(this);

                        const prefixId = item.attr('prefix-id');
                        const prefixName = item.attr('prefix-name');

                        item.find('label.item-number').html('Item ' + (itemIndex + 1));

                        const itemTitle = item.find('.item-title');
                        const itemTitleId = prefixId + itemIndex + '-title';
                        const itemTitleName = prefixName + itemIndex + '][title]';

                        itemTitle.find('label').attr('for', itemTitleId);
                        itemTitle.find('input').attr('id', itemTitleId).attr('name', itemTitleName);
                        
                        const itemContent = item.find('.item-content');
                        const itemContentId = prefixId + itemIndex + '-body';
                        const itemContentName = prefixName + itemIndex + '][body]';

                        itemContent.find('label').attr('for', itemContentId);
                        itemContent.find('input').attr('id', itemContentId).attr('name', itemContentName);
                    })
                }
            };
            $('.btn.delete').click(deleteBtnEvent);
            $('.btn.add').click(addBtnEvent);
        });
    </script>
@endsection