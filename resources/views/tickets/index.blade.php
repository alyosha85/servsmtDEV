@extends('layouts.admin_layout.admin_layout')
<style>
    #content {
        position: relative;
    }

    .ribbonLeft {
        position: absolute;
        top: -90px;
        left: 25px;
    }
    .ribbonRight {
        position: absolute;
        top: -110px;
        right: 25px;
    }
    .ribbonCenter {
        position: absolute;
        top: -140px;
        right: 850px;
    }
</style>
@section('content')
@include('tickets.layout_ticket.header',['title'=>'Ticketanfrage'])
<section class="content">
    <div class="container-fluid col-lg-12">
        <div class="row">
            <div class="col-12 mx-auto">
                <!-- Profile Image -->
                <div class="card card-primary card-outline" id="content">
                    <!-- <img src="/images/admin_images/eastern_egg_nobackground_scaled.png" class="ribbonLeft" style="max-width: 15%; max-height: 15%;"   alt="">
          <img src="/images/admin_images/easter_gift_scaled_backgroundremoved.png" class="ribbonRight" style="max-width: 20%; max-height: 20%;"   alt="">
          <img src="/images/admin_images/Ostern.png" class="ribbonCenter" style="max-width: 35%; max-height: 35%;"   alt=""> -->
                    <div class="card-body box-profile form-group">
                        <!-- child cards -->
                        <div class="row mx-auto justify-content-center">
                            <!-- second card -->
                            <div class="col-lg-12 ">
                                <a
                                    href="#"
                                    class="btn btn-outline-primary mb-3"
                                    data-toggle="modal"
                                    data-target="#overall"
                                >
                                    Willkommensvideo Anschauen
                                </a>
                                <a
                                    href="#"
                                    class="btn btn-outline-primary mb-3"
                                    data-toggle="modal"
                                    data-target="#inbox"
                                >
                                    Ticket-Erstellung Video Anschauen
                                </a>
                                <div
                                    class="card card-primary card-outline"
                                    id="underform"
                                >
                                    <!-- Content here -->
                                    <div id="cards_landscape_wrap-2">
                                        <div class="container-fluid">
                                            <div
                                                class="row d-flex justify-content-between"
                                            >
                                                <div
                                                    class="col-xs-12 col-sm-6 col-md-3 col-lg-2 d-flex align-items-stretch"
                                                >
                                                    <div class="card-flyer">
                                                        <div class="text-box">
                                                            <a
                                                                href="{{
                                                                    route(
                                                                        'computer_all'
                                                                    )
                                                                }}"
                                                            >
                                                                <div
                                                                    class="image-box"
                                                                >
                                                                    <img
                                                                        src="/images/admin_images/network_300.png"
                                                                        alt=""
                                                                    /></div
                                                            ></a>
                                                            <div
                                                                class="text-container"
                                                            >
                                                                <h6>
                                                                    PC / Laptop
                                                                </h6>
                                                                <ul
                                                                    class="list-unstyled"
                                                                >
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'softwareRequest'
                                                                                )
                                                                            }}"
                                                                            >Softwareanfrage</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'peripheralRequest'
                                                                                )
                                                                            }}"
                                                                            >Peripherie-Anfrage</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'hardwareRequest'
                                                                                )
                                                                            }}"
                                                                            >Hardware-Anfrage</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'pc_problems'
                                                                                )
                                                                            }}"
                                                                            >Probleme</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'printer_in_out'
                                                                                )
                                                                            }}"
                                                                            >Drucker
                                                                            Hinzu.
                                                                            /
                                                                            Ent.</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'other'
                                                                                )
                                                                            }}"
                                                                            >Sonstiges</a
                                                                        >
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xs-12 col-sm-6 col-md-3 col-lg-2 d-flex align-items-stretch"
                                                >
                                                    <div class="card-flyer">
                                                        <div class="text-box">
                                                            <a
                                                                href="{{
                                                                    route(
                                                                        'printer_all'
                                                                    )
                                                                }}"
                                                            >
                                                                <div
                                                                    class="image-box"
                                                                >
                                                                    <img
                                                                        src="/images/admin_images/Printer_300.png"
                                                                        alt=""
                                                                    /></div
                                                            ></a>
                                                            <div
                                                                class="text-container"
                                                            >
                                                                <h6>Drucker</h6>
                                                                <ul
                                                                    class="list-unstyled"
                                                                >
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'printer_in_out'
                                                                                )
                                                                            }}"
                                                                            >Neuen
                                                                            Drucker
                                                                            einrichten</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'hardwareRequest'
                                                                                )
                                                                            }}"
                                                                            >Hardware-Anfrage</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'scanner'
                                                                                )
                                                                            }}"
                                                                            >Scanner
                                                                            Probleme</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'functuality'
                                                                                )
                                                                            }}"
                                                                            >Funktionsanfrage</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'errors'
                                                                                )
                                                                            }}"
                                                                            >Fehlermeldung</a
                                                                        >
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xs-12 col-sm-6 col-md-3 col-lg-2 d-flex align-items-stretch"
                                                >
                                                    <div class="card-flyer">
                                                        <div class="text-box">
                                                            <a
                                                                href="{{
                                                                    route(
                                                                        'telephone_all'
                                                                    )
                                                                }}"
                                                            >
                                                                <div
                                                                    class="image-box"
                                                                >
                                                                    <img
                                                                        src="/images/admin_images/Phone_300.png"
                                                                        alt=""
                                                                    /></div
                                                            ></a>
                                                            <div
                                                                class="text-container"
                                                            >
                                                                <h6>Telefon</h6>
                                                                <ul
                                                                    class="list-unstyled"
                                                                >
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'tel_problems'
                                                                                )
                                                                            }}"
                                                                            >Probleme</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'tel_changes'
                                                                                )
                                                                            }}"
                                                                            >Änderungen</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'hardwareRequest'
                                                                                )
                                                                            }}"
                                                                            >Hardware-Anfrage</a
                                                                        >
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xs-12 col-sm-6 col-md-3 col-lg-2 d-flex align-items-stretch"
                                                >
                                                    <div class="card-flyer">
                                                        <div class="text-box">
                                                            <a
                                                                href="{{
                                                                    route(
                                                                        'users_all'
                                                                    )
                                                                }}"
                                                            >
                                                                <div
                                                                    class="image-box"
                                                                >
                                                                    <img
                                                                        src="/images/admin_images/benutzer.png"
                                                                        alt=""
                                                                    /></div
                                                            ></a>
                                                            <div
                                                                class="text-container"
                                                            >
                                                                <h6>
                                                                    Benutzer
                                                                </h6>
                                                                <ul
                                                                    class="list-unstyled"
                                                                >
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'users_employee'
                                                                                )
                                                                            }}"
                                                                            >Neuer
                                                                            Mitarbeiter</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'users_participant'
                                                                                )
                                                                            }}"
                                                                            >Neuer
                                                                            Teilnehmer</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'users_others'
                                                                                )
                                                                            }}"
                                                                            >Sonstiges</a
                                                                        >
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xs-12 col-sm-6 col-md-3 col-lg-2 d-flex align-items-stretch"
                                                >
                                                    <div class="card-flyer">
                                                        <div class="text-box">
                                                            <a
                                                                href="{{
                                                                    route(
                                                                        'web_all'
                                                                    )
                                                                }}"
                                                            >
                                                                <div
                                                                    class="image-box"
                                                                >
                                                                    <img
                                                                        src="/images/admin_images/www.png"
                                                                        alt=""
                                                                    /></div
                                                            ></a>
                                                            <div
                                                                class="text-container"
                                                            >
                                                                <h6>Web</h6>
                                                                <ul
                                                                    class="list-unstyled"
                                                                >
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'terminal_tn'
                                                                                )
                                                                            }}"
                                                                            >Terminal
                                                                            TN</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'bbb'
                                                                                )
                                                                            }}"
                                                                            >Big
                                                                            Blue
                                                                            Button</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'vtiger'
                                                                                )
                                                                            }}"
                                                                            >Vtiger</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'firmenvz'
                                                                                )
                                                                            }}"
                                                                            >FirmenVZ</a
                                                                        >
                                                                    </li>
                                                                    <li>
                                                                        <a
                                                                            href="{{
                                                                                route(
                                                                                    'smt'
                                                                                )
                                                                            }}"
                                                                            >SMT</a
                                                                        >
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xs-12 col-sm-6 col-md-3 col-lg-2 d-flex align-items-stretch"
                                                >
                                                    <div class="card-flyer">
                                                        <div class="text-box">
                                                            <a
                                                                href="{{
                                                                    route(
                                                                        'computer_all'
                                                                    )
                                                                }}"
                                                            >
                                                                <div
                                                                    class="image-box"
                                                                >
                                                                    <img
                                                                        src="/images/admin_images/construction.png"
                                                                        alt=""
                                                                    /></div
                                                            ></a>
                                                            <div
                                                                class="text-container"
                                                            >
                                                                <h6>
                                                                    In
                                                                    Bearbeitung
                                                                </h6>
                                                                <ul
                                                                    class="list-unstyled"
                                                                ></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end second card -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <!-- Modal -->
    <div
        class="modal fade"
        id="overall"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-backdrop="false"
    >
        <div class="modal-dialog" style="max-width: 1200px !important;">
            <div class="modal-content container">
                <div class="modal-header">
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video
                        fluid="true"
                        id="my-video"
                        class="video-js vjs-theme-city"
                        controls
                        preload="auto"
                        width="600"
                        height="400"
                        data-setup="{}"
                    >
                        <source
                            src="/images/admin_images/smt3.mp4"
                            type="video/mp4"
                        />
                    </video>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div
        class="modal fade"
        id="inbox"
        tabindex="-1"
        aria-labelledby="inboxLabel"
        aria-hidden="true"
        data-backdrop="false"
    >
        <div class="modal-dialog" style="max-width: 1200px !important;">
            <div class="modal-content container">
                <div class="modal-header">
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video
                        fluid="true"
                        id="my-video"
                        class="video-js vjs-theme-city"
                        controls
                        preload="auto"
                        width="600"
                        height="400"
                        data-setup="{}"
                    >
                        <source
                            src="/images/admin_images/inbox3.mp4"
                            type="video/mp4"
                        />
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @section('script')

<script>
    $(document).ready(function() {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "GET",
            url: "{{route('news.popup.check')}}",
            success: function(result) {
                if (result[0].isPublished === "on") {
                    var news_title = result[0].title;
                    var news_body = result[0].body;
                    Swal.fire({
                        title: news_title,
                        html: news_body,
                        width: 600,
                        padding: "3em",
                        color: "#661421",
                        showConfirmButton: false,
                        backdrop: `
            rgba(102,20,33,0.5)
            url("/images/admin_images/helpdesk.gif")
            top 150px
            left 900px 
            no-repeat
          `
                    });
                } else {
                    //
                }
            }
        });
    });
</script>

<script>
    $("body").on("hidden.bs.modal", ".modal", function() {
        $("video").trigger("pause");
    });
</script>

@endsection
