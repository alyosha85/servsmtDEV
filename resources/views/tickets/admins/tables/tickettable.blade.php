@extends('layouts.admin_layout.admin_layout')

<style>
table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
    left: 10px !important;
    text-indent: 0 !important;
    background-color: #661421 !important;
}
/* prevent blinking tooltip */
.tooltip {
  pointer-events: none;
}
/* datatable - hidden column wrapping */
.dtr-data {
    white-space:normal
}
</style>

@section('content')
  <!-- Main content -->
  <section class="content-fluid">
    <div class="row">
      <div class="col-md-11 mx-auto">
        <nav class="navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            @if(auth()->user()->hasRole('Super_Admin'))
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.opentickets')}}" role="button" data-toggle="tooltip" title="Offen"><i class="far fa-folder-open fa-2x" style="color: #661421"></i>
                <span class="badge badge-success">{{@$AllTicketsCount}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.unassigned')}}" role="button" data-toggle="tooltip" title="Nicht zugewiesen"><i class="fas fa-exclamation-triangle fa-2x" style="color:#661421"></i>
                <span class="badge badge-danger">{{@$UnassignedTicketsCount}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.usertickets')}}" role="button" data-toggle="tooltip" title="Eigene Tickets"><i class="fas fa-clipboard-list fa-2x" style="color:#661421"></i>
                <span class="badge badge-success">{{@$myTicketsCount}}</span>
              </a>
            </li>
            
          </ul>
      
          <!-- </ul> -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.mammach')}}"> 
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="32px" version="1.1" viewBox="0 0 32 32" width="32px"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g id="letter-J"><g id="Page-1" transform="translate(7.000000, 2.000000)"><path d="M18.471,3.8245 L18.471,18.0095 C18.471,19.2405 18.419,20.2875 18.314,21.1495 C18.209,22.0105 17.972,22.8855 17.603,23.7715 C16.987,25.2615 15.971,26.4225 14.555,27.2535 C13.139,28.0845 11.416,28.4995 9.384,28.4995 C7.549,28.4995 6.019,28.2105 4.794,27.6315 C3.569,27.0535 2.581,26.1175 1.83,24.8245 C1.436,24.1345 1.116,23.3405 0.869,22.4415 C0.623,21.5435 0.5,20.6875 0.5,19.8745 C0.5,19.0125 0.74,18.3535 1.22,17.8985 C1.701,17.4425 2.316,17.2155 3.067,17.2155 C3.794,17.2155 4.342,17.4245 4.711,17.8425 C5.08,18.2615 5.364,18.9145 5.561,19.8005 C5.77,20.7485 5.979,21.5065 6.189,22.0725 C6.398,22.6385 6.749,23.1255 7.241,23.5315 C7.734,23.9375 8.436,24.1415 9.347,24.1415 C11.773,24.1415 12.986,22.3615 12.986,18.8035 L12.986,3.8245 C12.986,2.7165 13.229,1.8855 13.715,1.3315 C14.201,0.7765 14.863,0.4995 15.701,0.4995 C16.55,0.4995 17.224,0.7765 17.723,1.3315 C18.222,1.8855 18.471,2.7165 18.471,3.8245" fill="#0284c7" id="Fill-1"/><path d="M18.471,3.8245 L18.471,18.0095 C18.471,19.2405 18.419,20.2875 18.314,21.1495 C18.209,22.0105 17.972,22.8855 17.603,23.7715 C16.987,25.2615 15.971,26.4225 14.555,27.2535 C13.139,28.0845 11.416,28.4995 9.384,28.4995 C7.549,28.4995 6.019,28.2105 4.794,27.6315 C3.569,27.0535 2.581,26.1175 1.83,24.8245 C1.436,24.1345 1.116,23.3405 0.869,22.4415 C0.623,21.5435 0.5,20.6875 0.5,19.8745 C0.5,19.0125 0.74,18.3535 1.22,17.8985 C1.701,17.4425 2.316,17.2155 3.067,17.2155 C3.794,17.2155 4.342,17.4245 4.711,17.8425 C5.08,18.2615 5.364,18.9145 5.561,19.8005 C5.77,20.7485 5.979,21.5065 6.189,22.0725 C6.398,22.6385 6.749,23.1255 7.241,23.5315 C7.734,23.9375 8.436,24.1415 9.347,24.1415 C11.773,24.1415 12.986,22.3615 12.986,18.8035 L12.986,3.8245 C12.986,2.7165 13.229,1.8855 13.715,1.3315 C14.201,0.7765 14.863,0.4995 15.701,0.4995 C16.55,0.4995 17.224,0.7765 17.723,1.3315 C18.222,1.8855 18.471,2.7165 18.471,3.8245 L18.471,3.8245 Z" id="Stroke-3" stroke="#330910"/><path d="M17.1416,22.5798 C16.5706,23.9618 15.6156,25.0518 14.3026,25.8218 C12.9716,26.6028 11.3166,26.9998 9.3836,26.9998 C7.6316,26.9998 6.1596,26.7238 5.0086,26.1798 C3.8816,25.6478 2.9576,24.7708 2.2616,23.5738 C1.8926,22.9268 1.5856,22.1638 1.3516,21.3098 C1.1666,20.6338 1.0746,19.9858 1.0366,19.3608 C1.0126,19.5198 0.9996,19.6908 0.9996,19.8748 C0.9996,20.6398 1.1186,21.4588 1.3516,22.3098 C1.5856,23.1638 1.8926,23.9268 2.2616,24.5738 C2.9576,25.7708 3.8816,26.6478 5.0086,27.1798 C6.1596,27.7238 7.6316,27.9998 9.3836,27.9998 C11.3166,27.9998 12.9716,27.6028 14.3026,26.8218 C15.6156,26.0518 16.5706,24.9618 17.1416,23.5798 C17.4916,22.7378 17.7196,21.8998 17.8176,21.0888 C17.9196,20.2478 17.9716,19.2118 17.9716,18.0098 L17.9716,17.0098 C17.9716,18.2118 17.9196,19.2478 17.8176,20.0888 C17.7196,20.8998 17.4916,21.7378 17.1416,22.5798" fill="#332E09" id="Fill-5" opacity="0.203766325"/><path d="M14.8428,2.32 C14.9818,2.162 15.1928,2 15.7008,2" id="Stroke-7" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round"/></g></g></g></svg>
                <span class="badge badge-primary">{{@$julian}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.ara')}}">
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="32px" version="1.1" viewBox="0 0 32 32" width="32px"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g id="letter-A"><g id="Page-1" transform="translate(3.000000, 2.000000)"><path d="M8.9037,17.4551 L16.9937,17.4551 L12.9117,6.2811 L8.9037,17.4551 Z M19.7637,24.9721 L18.4707,21.5741 L7.4627,21.5741 L6.1697,25.0461 C5.6657,26.4001 5.2347,27.3151 4.8777,27.7891 C4.5207,28.2631 3.9357,28.5001 3.1227,28.5001 C2.4327,28.5001 1.8237,28.2471 1.2937,27.7431 C0.7647,27.2381 0.4997,26.6651 0.4997,26.0251 C0.4997,25.6561 0.5617,25.2741 0.6847,24.8801 C0.8077,24.4861 1.0107,23.9381 1.2937,23.2361 L8.2207,5.6531 C8.4177,5.1481 8.6547,4.5421 8.9317,3.8341 C9.2087,3.1261 9.5037,2.5381 9.8177,2.0701 C10.1317,1.6021 10.5447,1.2231 11.0557,0.9341 C11.5667,0.6451 12.1977,0.5001 12.9487,0.5001 C13.7117,0.5001 14.3487,0.6451 14.8597,0.9341 C15.3707,1.2231 15.7837,1.5961 16.0977,2.0511 C16.4117,2.5071 16.6767,2.9961 16.8917,3.5201 C17.1077,4.0431 17.3817,4.7421 17.7137,5.6161 L24.7877,23.0881 C25.3417,24.4181 25.6187,25.3851 25.6187,25.9881 C25.6187,26.6161 25.3567,27.1921 24.8337,27.7151 C24.3107,28.2381 23.6797,28.5001 22.9407,28.5001 C22.5097,28.5001 22.1407,28.4231 21.8327,28.2691 C21.5247,28.1151 21.2657,27.9061 21.0567,27.6411 C20.8477,27.3761 20.6227,26.9701 20.3827,26.4221 C20.1427,25.8741 19.9367,25.3911 19.7637,24.9721 L19.7637,24.9721 Z" fill="#c2410C" id="Fill-1"/><path d="M8.9037,17.4551 L16.9937,17.4551 L12.9117,6.2811 L8.9037,17.4551 L8.9037,17.4551 Z M19.7637,24.9721 L18.4707,21.5741 L7.4627,21.5741 L6.1697,25.0461 C5.6657,26.4001 5.2347,27.3151 4.8777,27.7891 C4.5207,28.2631 3.9357,28.5001 3.1227,28.5001 C2.4327,28.5001 1.8237,28.2471 1.2937,27.7431 C0.7647,27.2381 0.4997,26.6651 0.4997,26.0251 C0.4997,25.6561 0.5617,25.2741 0.6847,24.8801 C0.8077,24.4861 1.0107,23.9381 1.2937,23.2361 L8.2207,5.6531 C8.4177,5.1481 8.6547,4.5421 8.9317,3.8341 C9.2087,3.1261 9.5037,2.5381 9.8177,2.0701 C10.1317,1.6021 10.5447,1.2231 11.0557,0.9341 C11.5667,0.6451 12.1977,0.5001 12.9487,0.5001 C13.7117,0.5001 14.3487,0.6451 14.8597,0.9341 C15.3707,1.2231 15.7837,1.5961 16.0977,2.0511 C16.4117,2.5071 16.6767,2.9961 16.8917,3.5201 C17.1077,4.0431 17.3817,4.7421 17.7137,5.6161 L24.7877,23.0881 C25.3417,24.4181 25.6187,25.3851 25.6187,25.9881 C25.6187,26.6161 25.3567,27.1921 24.8337,27.7151 C24.3107,28.2381 23.6797,28.5001 22.9407,28.5001 C22.5097,28.5001 22.1407,28.4231 21.8327,28.2691 C21.5247,28.1151 21.2657,27.9061 21.0567,27.6411 C20.8477,27.3761 20.6227,26.9701 20.3827,26.4221 C20.1427,25.8741 19.9367,25.3911 19.7637,24.9721 L19.7637,24.9721 Z" id="Stroke-3" stroke="#330910"/><path d="M4.4778,26.4883 C4.2188,26.8333 3.7748,27.0003 3.1228,27.0003 C2.5608,27.0003 2.0758,26.7983 1.6398,26.3823 C1.3358,26.0923 1.1488,25.7853 1.0608,25.4543 C1.0238,25.6493 0.9998,25.8413 0.9998,26.0253 C0.9998,26.5273 1.2088,26.9703 1.6398,27.3823 C2.0758,27.7983 2.5608,28.0003 3.1228,28.0003 C3.7748,28.0003 4.2188,27.8333 4.4778,27.4883 C4.8048,27.0533 5.2168,26.1733 5.7018,24.8713 L6.9488,21.5223 C6.9488,21.5223 4.7458,26.1323 4.4778,26.4883 L4.4778,26.4883 Z M7.1158,21.0743 L18.8158,21.0743 L7.1158,21.0743 Z M18.9508,21.4293 L20.2268,24.7823 C20.3968,25.1973 20.6018,25.6763 20.8408,26.2203 C21.0618,26.7273 21.2678,27.1003 21.4498,27.3323 C21.6128,27.5393 21.8118,27.7003 22.0548,27.8223 C22.2928,27.9403 22.5908,28.0003 22.9408,28.0003 C23.5468,28.0003 24.0508,27.7913 24.4798,27.3613 C24.9098,26.9313 25.1188,26.4823 25.1188,25.9883 C25.1188,25.8603 25.0998,25.6793 25.0508,25.4363 C24.9598,25.7593 24.7758,26.0653 24.4798,26.3613 C24.0508,26.7913 23.5468,27.0003 22.9408,27.0003 C22.5908,27.0003 22.2928,26.9403 22.0548,26.8223 C21.8118,26.7003 21.6128,26.5393 21.4498,26.3323 C21.2678,26.1003 21.0618,25.7273 20.8408,25.2203 C20.6018,24.6763 20.3968,24.1973 20.2268,23.7823 L18.9508,21.4293 Z M18.8158,20.0743 L7.1158,20.0743 L18.8158,20.0743 Z" fill="#332E09" id="Fill-5" opacity="0.203766325"/><path d="M9.7684,5.9785 L7.2054,12.6035" id="Stroke-7" stroke="#FFFFFF" stroke-dasharray="1,2,6,2,3" stroke-linecap="round" stroke-linejoin="round"/></g></g></g></svg>
                <span class="badge badge-primary">{{@$ara}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.rolf')}}">
             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="32px" version="1.1" viewBox="0 0 32 32" width="32px"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g id="letter-R"><g id="Page-1" transform="translate(4.000000, 2.000000)"><path d="M11.223,4.6878 L6.077,4.6878 L6.077,12.2558 L11.073,12.2558 C12.412,12.2558 13.539,12.1398 14.453,11.9088 C15.367,11.6768 16.065,11.2828 16.547,10.7258 C17.029,10.1678 17.27,9.4018 17.27,8.4248 C17.27,7.6608 17.076,6.9878 16.688,6.4058 C16.3,5.8238 15.761,5.3888 15.073,5.1008 C14.422,4.8258 13.138,4.6878 11.223,4.6878 M8.031,16.2558 L6.077,16.2558 L6.077,25.1008 C6.077,26.2648 5.821,27.1228 5.308,27.6738 C4.794,28.2248 4.124,28.4998 3.298,28.4998 C2.409,28.4998 1.721,28.2118 1.232,27.6358 C0.744,27.0598 0.5,26.2148 0.5,25.1008 L0.5,3.9178 C0.5,2.7158 0.769,1.8458 1.308,1.3078 C1.846,0.7688 2.716,0.4998 3.918,0.4998 L12.988,0.4998 C14.24,0.4998 15.311,0.5528 16.2,0.6598 C17.088,0.7658 17.89,0.9818 18.603,1.3078 C19.467,1.6708 20.231,2.1898 20.894,2.8658 C21.558,3.5418 22.062,4.3278 22.406,5.2228 C22.75,6.1178 22.923,7.0668 22.923,8.0678 C22.923,10.1208 22.343,11.7618 21.185,12.9878 C20.027,14.2148 18.272,15.0858 15.918,15.5988 C16.907,16.1248 17.852,16.9008 18.754,17.9268 C19.655,18.9538 20.459,20.0458 21.167,21.2038 C21.874,22.3618 22.425,23.4078 22.819,24.3408 C23.214,25.2728 23.411,25.9148 23.411,26.2648 C23.411,26.6288 23.295,26.9878 23.063,27.3448 C22.832,27.7018 22.516,27.9838 22.115,28.1898 C21.714,28.3968 21.251,28.4998 20.725,28.4998 C20.099,28.4998 19.574,28.3528 19.148,28.0588 C18.722,27.7648 18.356,27.3918 18.049,26.9418 C17.743,26.4908 17.326,25.8268 16.8,24.9508 L14.566,21.2328 C13.764,19.8678 13.048,18.8288 12.415,18.1148 C11.783,17.4018 11.142,16.9128 10.491,16.6498 C9.84,16.3878 9.02,16.2558 8.031,16.2558" fill="#ff10f0" id="Fill-1"/><path d="M11.223,4.6878 L6.077,4.6878 L6.077,12.2558 L11.073,12.2558 C12.412,12.2558 13.539,12.1398 14.453,11.9088 C15.367,11.6768 16.065,11.2828 16.547,10.7258 C17.029,10.1678 17.27,9.4018 17.27,8.4248 C17.27,7.6608 17.076,6.9878 16.688,6.4058 C16.3,5.8238 15.761,5.3888 15.073,5.1008 C14.422,4.8258 13.138,4.6878 11.223,4.6878 L11.223,4.6878 Z M8.031,16.2558 L6.077,16.2558 L6.077,25.1008 C6.077,26.2648 5.821,27.1228 5.308,27.6738 C4.794,28.2248 4.124,28.4998 3.298,28.4998 C2.409,28.4998 1.721,28.2118 1.232,27.6358 C0.744,27.0598 0.5,26.2148 0.5,25.1008 L0.5,3.9178 C0.5,2.7158 0.769,1.8458 1.308,1.3078 C1.846,0.7688 2.716,0.4998 3.918,0.4998 L12.988,0.4998 C14.24,0.4998 15.311,0.5528 16.2,0.6598 C17.088,0.7658 17.89,0.9818 18.603,1.3078 C19.467,1.6708 20.231,2.1898 20.894,2.8658 C21.558,3.5418 22.062,4.3278 22.406,5.2228 C22.75,6.1178 22.923,7.0668 22.923,8.0678 C22.923,10.1208 22.343,11.7618 21.185,12.9878 C20.027,14.2148 18.272,15.0858 15.918,15.5988 C16.907,16.1248 17.852,16.9008 18.754,17.9268 C19.655,18.9538 20.459,20.0458 21.167,21.2038 C21.874,22.3618 22.425,23.4078 22.819,24.3408 C23.214,25.2728 23.411,25.9148 23.411,26.2648 C23.411,26.6288 23.295,26.9878 23.063,27.3448 C22.832,27.7018 22.516,27.9838 22.115,28.1898 C21.714,28.3968 21.251,28.4998 20.725,28.4998 C20.099,28.4998 19.574,28.3528 19.148,28.0588 C18.722,27.7648 18.356,27.3918 18.049,26.9418 C17.743,26.4908 17.326,25.8268 16.8,24.9508 L14.566,21.2328 C13.764,19.8678 13.048,18.8288 12.415,18.1148 C11.783,17.4018 11.142,16.9128 10.491,16.6498 C9.84,16.3878 9.02,16.2558 8.031,16.2558 L8.031,16.2558 Z" id="Stroke-3" stroke="#092933" stroke-linejoin="round"/><path d="M22.8071,25.7421 C22.7641,25.8511 22.7171,25.9611 22.6441,26.0741 C22.4581,26.3591 22.2101,26.5791 21.8861,26.7461 C21.5591,26.9151 21.1691,27.0001 20.7251,27.0001 C20.1981,27.0001 19.7751,26.8841 19.4331,26.6471 C19.0591,26.3891 18.7331,26.0571 18.4631,25.6601 C18.1671,25.2261 17.7521,24.5651 17.2291,23.6931 L14.9941,19.9741 C14.1831,18.5931 13.7621,18.1601 13.1121,17.4251 C12.4301,16.6561 10.6771,16.1861 10.6771,16.1861 C11.0121,16.3211 11.3451,16.5101 11.6741,16.7501 C12.0521,17.0271 12.4251,17.3721 12.7901,17.7841 C13.4401,18.5181 14.1831,19.5931 14.9941,20.9741 L17.2291,24.6931 C17.7521,25.5651 18.1671,26.2261 18.4631,26.6601 C18.7331,27.0571 19.0591,27.3891 19.4331,27.6471 C19.7751,27.8841 20.1981,28.0001 20.7251,28.0001 C21.1691,28.0001 21.5591,27.9151 21.8861,27.7461 C22.2101,27.5791 22.4581,27.3591 22.6441,27.0741 C22.8231,26.7961 22.9101,26.5331 22.9101,26.2651 C22.9101,26.1841 22.8901,26.0271 22.8071,25.7421 M3.2981,27.0001 C2.5561,27.0001 2.0051,26.7751 1.6141,26.3131 C1.2061,25.8331 1.0001,25.0881 1.0001,24.1011 L1.0001,25.1011 C1.0001,26.0881 1.2061,26.8331 1.6141,27.3131 C2.0051,27.7751 2.5561,28.0001 3.2981,28.0001 C3.9861,28.0001 4.5231,27.7821 4.9421,27.3331 C5.3641,26.8791 5.5771,26.1291 5.5771,25.1011 L5.5771,24.1011 C5.5771,25.1291 5.3641,25.8791 4.9421,26.3331 C4.5231,26.7821 3.9861,27.0001 3.2981,27.0001" fill="#332E09" id="Fill-5" opacity="0.203766325"/><path d="M6.0775,2.1129 L13.2055,2.1129" id="Stroke-7" stroke="#FFFFFF" stroke-dasharray="1,2,6,2,3" stroke-linecap="round" stroke-linejoin="round"/></g></g></g></svg>
                <span class="badge badge-rolf" style="
                  color: #fff;
                  background-color: #FF10f0;
               ">{{@$rolf}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.basti')}}">
             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="32px" version="1.1" viewBox="0 0 32 32" width="32px"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g id="letter-S"><g id="Page-1" transform="translate(5.000000, 2.000000)"><path d="M22.0172,19.9116 C22.0172,21.5496 21.5952,23.0206 20.7522,24.3256 C19.9082,25.6306 18.6742,26.6526 17.0492,27.3916 C15.4232,28.1306 13.4962,28.4996 11.2682,28.4996 C8.5962,28.4996 6.3922,27.9956 4.6562,26.9856 C3.4242,26.2586 2.4242,25.2896 1.6542,24.0766 C0.8852,22.8636 0.5002,21.6846 0.5002,20.5396 C0.5002,19.8746 0.7312,19.3056 1.1922,18.8316 C1.6542,18.3566 2.2422,18.1196 2.9562,18.1196 C3.5352,18.1196 4.0242,18.3046 4.4252,18.6746 C4.8252,19.0436 5.1672,19.5916 5.4502,20.3176 C5.7942,21.1796 6.1672,21.9006 6.5672,22.4786 C6.9672,23.0576 7.5312,23.5346 8.2572,23.9106 C8.9842,24.2856 9.9382,24.4736 11.1202,24.4736 C12.7452,24.4736 14.0662,24.0946 15.0822,23.3376 C16.0972,22.5806 16.6052,21.6356 16.6052,20.5026 C16.6052,19.6036 16.3312,18.8746 15.7832,18.3136 C15.2362,17.7536 14.5282,17.3256 13.6592,17.0306 C12.7912,16.7346 11.6312,16.4206 10.1782,16.0886 C8.2322,15.6326 6.6042,15.1006 5.2932,14.4906 C3.9812,13.8816 2.9412,13.0506 2.1712,11.9976 C1.4022,10.9446 1.0172,9.6366 1.0172,8.0726 C1.0172,6.5826 1.4232,5.2586 2.2362,4.1016 C3.0492,2.9446 4.2252,2.0546 5.7642,1.4326 C7.3032,0.8106 9.1132,0.4996 11.1942,0.4996 C12.8562,0.4996 14.2942,0.7066 15.5062,1.1186 C16.7192,1.5316 17.7262,2.0796 18.5262,2.7626 C19.3272,3.4456 19.9112,4.1636 20.2812,4.9146 C20.6502,5.6656 20.8352,6.3976 20.8352,7.1126 C20.8352,7.7646 20.6042,8.3526 20.1422,8.8756 C19.6812,9.3996 19.1052,9.6606 18.4152,9.6606 C17.7872,9.6606 17.3102,9.5036 16.9842,9.1896 C16.6582,8.8756 16.3042,8.3616 15.9222,7.6476 C15.4292,6.6256 14.8382,5.8286 14.1492,5.2556 C13.4592,4.6836 12.3512,4.3966 10.8242,4.3966 C9.4082,4.3966 8.2662,4.7076 7.3982,5.3296 C6.5302,5.9516 6.0962,6.6996 6.0962,7.5736 C6.0962,8.1156 6.2442,8.5836 6.5392,8.9776 C6.8352,9.3716 7.2412,9.7106 7.7582,9.9936 C8.2762,10.2766 8.7992,10.4986 9.3282,10.6586 C9.8582,10.8186 10.7322,11.0526 11.9512,11.3606 C13.4782,11.7176 14.8602,12.1116 16.0972,12.5426 C17.3352,12.9736 18.3882,13.4966 19.2562,14.1126 C20.1242,14.7276 20.8012,15.5066 21.2872,16.4486 C21.7742,17.3906 22.0172,18.5446 22.0172,19.9116" fill="#16a34a" id="Fill-1"/><path d="M22.0172,19.9116 C22.0172,21.5496 21.5952,23.0206 20.7522,24.3256 C19.9082,25.6306 18.6742,26.6526 17.0492,27.3916 C15.4232,28.1306 13.4962,28.4996 11.2682,28.4996 C8.5962,28.4996 6.3922,27.9956 4.6562,26.9856 C3.4242,26.2586 2.4242,25.2896 1.6542,24.0766 C0.8852,22.8636 0.5002,21.6846 0.5002,20.5396 C0.5002,19.8746 0.7312,19.3056 1.1922,18.8316 C1.6542,18.3566 2.2422,18.1196 2.9562,18.1196 C3.5352,18.1196 4.0242,18.3046 4.4252,18.6746 C4.8252,19.0436 5.1672,19.5916 5.4502,20.3176 C5.7942,21.1796 6.1672,21.9006 6.5672,22.4786 C6.9672,23.0576 7.5312,23.5346 8.2572,23.9106 C8.9842,24.2856 9.9382,24.4736 11.1202,24.4736 C12.7452,24.4736 14.0662,24.0946 15.0822,23.3376 C16.0972,22.5806 16.6052,21.6356 16.6052,20.5026 C16.6052,19.6036 16.3312,18.8746 15.7832,18.3136 C15.2362,17.7536 14.5282,17.3256 13.6592,17.0306 C12.7912,16.7346 11.6312,16.4206 10.1782,16.0886 C8.2322,15.6326 6.6042,15.1006 5.2932,14.4906 C3.9812,13.8816 2.9412,13.0506 2.1712,11.9976 C1.4022,10.9446 1.0172,9.6366 1.0172,8.0726 C1.0172,6.5826 1.4232,5.2586 2.2362,4.1016 C3.0492,2.9446 4.2252,2.0546 5.7642,1.4326 C7.3032,0.8106 9.1132,0.4996 11.1942,0.4996 C12.8562,0.4996 14.2942,0.7066 15.5062,1.1186 C16.7192,1.5316 17.7262,2.0796 18.5262,2.7626 C19.3272,3.4456 19.9112,4.1636 20.2812,4.9146 C20.6502,5.6656 20.8352,6.3976 20.8352,7.1126 C20.8352,7.7646 20.6042,8.3526 20.1422,8.8756 C19.6812,9.3996 19.1052,9.6606 18.4152,9.6606 C17.7872,9.6606 17.3102,9.5036 16.9842,9.1896 C16.6582,8.8756 16.3042,8.3616 15.9222,7.6476 C15.4292,6.6256 14.8382,5.8286 14.1492,5.2556 C13.4592,4.6836 12.3512,4.3966 10.8242,4.3966 C9.4082,4.3966 8.2662,4.7076 7.3982,5.3296 C6.5302,5.9516 6.0962,6.6996 6.0962,7.5736 C6.0962,8.1156 6.2442,8.5836 6.5392,8.9776 C6.8352,9.3716 7.2412,9.7106 7.7582,9.9936 C8.2762,10.2766 8.7992,10.4986 9.3282,10.6586 C9.8582,10.8186 10.7322,11.0526 11.9512,11.3606 C13.4782,11.7176 14.8602,12.1116 16.0972,12.5426 C17.3352,12.9736 18.3882,13.4966 19.2562,14.1126 C20.1242,14.7276 20.8012,15.5066 21.2872,16.4486 C21.7742,17.3906 22.0172,18.5446 22.0172,19.9116 L22.0172,19.9116 Z" id="Stroke-3" stroke="#330910"/><path d="M2.5174,8.0727 C2.5174,6.8877 2.8274,5.8707 3.4634,4.9647 C4.1134,4.0387 5.0484,3.3397 6.3254,2.8237" id="Stroke-5" stroke="#FFFFFF" stroke-dasharray="1,2,6,2,3" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.4903,19.3202 C21.4243,20.6902 21.0473,21.9482 20.3323,23.0542 C19.5463,24.2712 18.3723,25.2412 16.8413,25.9372 C15.2883,26.6432 13.4133,27.0002 11.2673,27.0002 C8.6973,27.0002 6.5573,26.5142 4.9083,25.5532 C3.7523,24.8722 2.7993,23.9492 2.0763,22.8092 C1.4893,21.8842 1.1543,20.9782 1.0483,20.1052 C1.0183,20.2442 1.0003,20.3872 1.0003,20.5392 C1.0003,21.5832 1.3623,22.6832 2.0763,23.8092 C2.7993,24.9492 3.7523,25.8722 4.9083,26.5532 C6.5573,27.5142 8.6973,28.0002 11.2673,28.0002 C13.4133,28.0002 15.2883,27.6432 16.8413,26.9372 C18.3723,26.2412 19.5463,25.2712 20.3323,24.0542 C21.1193,22.8372 21.5173,21.4442 21.5173,19.9112 C21.5173,19.7062 21.5023,19.5152 21.4903,19.3202" fill="#332E09" id="Fill-7" opacity="0.203766325"/></g></g></g></svg>
                <span class="badge badge-primary">{{@$basti}}</span>
              </a>
            </li>
            <li class="nav-item ml-5">
              <a class="nav-link" data-toggle="tooltip" title="Erledigte Tickets" href="{{route('ticket.userticketsdone')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#661421" d="M18 7l-1.41-1.41-6.34 6.34 1.41 1.41L18 7zm4.24-1.41L11.66 16.17 7.48 12l-1.41 1.41L11.66 19l12-12-1.42-1.41zM.41 13.41L6 19l1.41-1.41L1.83 12 .41 13.41z"/></svg>
              </a>
            </li>
          </ul>  
          @endif
        </nav>

      </div>
      <!-- /.col -->
      <div class="col-md-11 mx-auto">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title text-bold">
              @if (URL::current() == route('ticket.opentickets'))   
              Anzahl offener Tickets:{{@$AllTicketsCount}}</h3>
              @elseif  (URL::current() == route('ticket.unassigned'))
              Anzahl Nicht zugewiesener Tickets: {{@$UnassignedTicketsCount}}</h3>
              @elseif  (URL::current() == route('ticket.history'))
              Anzahl Erledigter Tickets: {{@$done}}</h3>
              @endif

          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-messages display nowrap" style="width: 100%;">
              <table class="display responsive compact table-sm" id="ticket_table">
                <thead>
                  <tr>
                    <th></th>
                    <th class="text-center"></th>
                    <th class="text-center">Erstellt von</th>
                    <th>Anfrage</th>
                    <th>Das Ger??t</th>
                    <th>Tel</th>
                    <th>Standort</th>
                    <th>Priorit??t</th>
                    <th>Erstellt am</th>
                    <th class="none">Beschreibung</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($myTickets as $myTicket)
                <tr>
                  <td class="text-center">
                    @if($myTicket->ticket_status_id == 1)
                    <i class="fas fa-circle fa-1x" data-toggle="tooltip" title="Nicht begonnen" style="color:#001B2E"></i>
                    @elseif($myTicket->ticket_status_id == 2)
                    <i class="fas fa-wrench fa-1x" data-toggle="tooltip" title="In Bearbeitung" style="color:#3490DC"></i>
                    @elseif($myTicket->ticket_status_id == 3)
                    <i class="far fa-check-circle fa-1x" data-toggle="tooltip" title="Erledigt" style="color:#285D17"></i>
                    @elseif($myTicket->ticket_status_id == 4)
                    <i class="fas fa-user-friends fa-1x" data-toggle="tooltip" title="Wartet auf jemand anderen" style="color:#F9A620"></i>
                    @elseif($myTicket->ticket_status_id == 5)
                    <i class="fas fa-pause fa-1x" data-toggle="tooltip" title="Zur??ckgestellt" style="color:#e3342f"></i>
                    @else
                    <i class="far fa-copy fa-1x" data-toggle="tooltip" title="Duplikat" style="color:#285D17"></i>
                    @endif
                  </td>
                  <td class="col-md-1">
                    <select name="assignedTo" id="{{$myTicket->id}}" class="mailbox-star assignTo custom-select">
                      <option value="">Zuweisen</option>
                        @foreach($admins as $admin)
                          <option value="{{ $admin->id }}"{{$admin->id == $myTicket->assignedTo ? 'selected' : '' }}>{{ $admin->username }}</option>
                        @endforeach
                    </select>
                  </td>
                  <!-- <td class="text-left">
                    <span class="btn btn-success btn-small"><i class="fas fa-check"></i></span>
                  </td> -->

                  <td class="text-center"><a href="{{url ('ticket/'.$myTicket->id)}}">{{@$myTicket->subUser->username}}</a></td>
                  <!-- <td><a>{{$myTicket->tel_number}}</a></td>
                  <td><a>{{$myTicket->custom_tel_number}}</a></td> -->
                  <td><a href="{{url ('ticket/'.$myTicket->id)}}">{{$myTicket->problem_type}}</a></td>
                  
                  <td><b>{{@$myTicket->invitem->gname}} </b></td>
                  <td>{{@$myTicket->tel_number}}
                    @if(@$myTicket->custom_tel_number)
                    <i class="fas fa-grip-lines-vertical"></i> {{@$myTicket->custom_tel_number}}
                    @endif
                  </td>
                  <td>{{@$myTicket->subUser->ort}}</td>
                  <td>
                    @if($myTicket->priority_id == 1)
                    <!-- <i class="fas fa-circle" data-toggle="tooltip" title="bla bla" style="color:#3490dc"></i> -->
                    <span class="badge badge-pill badge-primary">Niedrig</span>

                    @elseif ($myTicket->priority_id == 2)
                    <!-- <i class="fas fa-circle " data-toggle="tooltip" title="bla bla" style="color:#285D17"></i> -->
                    <span class="badge badge-pill badge-success">Normal</span>
                    @else
                    <!-- <i class="fas fa-circle" data-toggle="tooltip" title="bla bla" style="color:#e3342f"></i> -->
                    <span class="badge badge-pill badge-danger">Hoch</span>
                    @endif
                  </td>
                  <td>{{@$myTicket->created_at->diffForHumans()}}
                    <p class="small muted">{{ @$myTicket->created_at->format('d.m.Y ')}}</p>
                  </td>
                  <td>{!!$myTicket->notizen!!}</td>
                </tr>
                @empty
                  <td class="text-center">
                    <img src="/images/admin_images/no_ticket.png" alt="why not">
                  </td>
                @endforelse
                </tbody>
              </table>
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer p-0">
            <div class="mailbox-controls">
              <div class="float-right">
                <div class="btn-group">
                  <!-- <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button> -->
                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.float-right -->
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>


@endsection
@section('script')
<script>

$(document).ready(function() {
    $('#ticket_table').DataTable({
      searching: false, 
      paging: false, 
      info: false,
      responsive: true,
      autoWidth: false,
      columnDefs: [
    { targets: 8, width: "1%" },
    { "orderable": false, "targets": 1},
    { "orderable": false, "targets": 8}
    ]
    });
} );

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function(){
  $(document).on('change', '.assignTo', function() {
    let ticket_id = $(this).attr('id')
    let assignedTo = $(this).val();
   $.ajax({
    type:"post",
    url: "{{route('ticket.assignedTo')}}",
    data: {"assignedTo":assignedTo,"ticket_id":ticket_id},
    success:function(result){
    }
   });
  });
})
</script>


@endsection
