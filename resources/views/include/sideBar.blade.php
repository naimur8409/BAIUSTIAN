<div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">


                    <li class="nav-item" ><a class="nav-item-hold" href="{{ route('home') }}"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                    </li>

                @if(auth()->user()->hasRole('admin'))
                    <li class="nav-item" data-item="user">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">User</span>
                        </a>
                        <div class="triangle"></div>
                    </li>


                    {{-- =====Batch=== --}}
                    <li class="nav-item" data-item="Batch">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Batch</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                    {{-- =====Faculty=== --}}
                    <li class="nav-item" data-item="faculty">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Faculty</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                    {{-- =====Students=== --}}
                    <li class="nav-item" data-item="student">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Student</span>
                        </a>
                        <div class="triangle"></div>
                    </li>



                    {{-- =====Course=== --}}
                    <li class="nav-item" data-item="course">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Course</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                @endif

                    {{-- =================Course=========== --}}
                @if(auth()->user()->hasRole('student') || auth()->user()->hasRole('faculty') )

                        <li class="nav-item" >
                            <a class="nav-item-hold" href="{{ route('course.list') }}">
                                <i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Courses</span>
                            </a>
                        </li>
                @endif
                    {{-- =================Result=========== --}}
                @if(auth()->user()->hasRole('student'))
                    <li class="nav-item" >
                        <a class="nav-item-hold" href="{{ route('result.myResult') }}">
                            <i class="nav-icon i-Bar-Chart"></i><span class="nav-text">My Result</span>
                        </a>
                    </li>

                    <li class="nav-item" >
                        <a class="nav-item-hold" href="{{ route('notice.index') }}">
                            <i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Notices</span>
                        </a>
                    </li>
                @endif

                    {{-- =================Notice=========== --}}
                @if(auth()->user()->hasRole('faculty') || auth()->user()->hasRole('admin') )
                    <li class="nav-item" >
                        <a class="nav-item-hold" href="{{ route('result.ct_result') }}">
                            <i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Manage Notice</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('admin'))
                    {{-- =====Result=== --}}
                    <li class="nav-item" data-item="result">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Result</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                @endif

                    {{-- <li class="nav-item"><a class="nav-item-hold" href="datatables.html"><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">Datatables</span></a>
                        <div class="triangle"></div>
                    </li> --}}
                </ul>
            </div>
            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">

                {{-- ==================Users================== --}}
                <ul class="childNav" data-parent="user">
                    <li class="nav-item">
                        <a href="{{ route('user.list') }}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">User Setting</span>
                        </a>
                    </li>

                </ul>

                {{-- ==================Batch================== --}}
                <ul class="childNav" data-parent="Batch">
                    <li class="nav-item"><a href="{{ route('semester.list') }}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Semesters Management</span></a></li>
                    {{-- <li class="nav-item"><a href="{{ route('allAdmin',2) }}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Log</span></a></li> --}}

                </ul>

                {{-- ==================Faculty================== --}}
                <ul class="childNav" data-parent="faculty">
                    <li class="nav-item"><a href="{{ route('faculty.list') }}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Faculty Management</span></a></li>
                    {{-- <li class="nav-item"><a href="{{ route('allAdmin',2) }}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Log</span></a></li> --}}

                </ul>


                {{-- ==================Student================== --}}
                <ul class="childNav" data-parent="student">
                    <li class="nav-item">
                        <a href="{{ route('student.list') }}">
                            <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Student Management</span>
                        </a>
                    </li>
                </ul>

                {{-- ==================Course================== --}}
                <ul class="childNav" data-parent="course">
                    <li class="nav-item">

                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('course.list') }}">
                                <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                                <span class="item-name">Course Management</span>
                            </a>
                        @endif

                    </li>
                </ul>

                {{-- ==================Result================== --}}
                <ul class="childNav" data-parent="result">
                    <li class="nav-item">
                        <a href="{{ route('result.list') }}">
                            <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Result Management</span>
                        </a>
                    </li>
                </ul>


                <!-- Submenu Dashboards-->

                <ul class="childNav" data-parent="forms">
                    <li class="nav-item"><a href="form.basic.html"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Basic Elements</span></a></li>
                    <li class="nav-item"><a href="form.layouts.html"><i class="nav-icon i-Split-Vertical"></i><span class="item-name">Form Layouts</span></a></li>
                    <li class="nav-item"><a href="form.input.group.html"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Input Groups</span></a></li>
                    <li class="nav-item"><a href="form.validation.html"><i class="nav-icon i-Close-Window"></i><span class="item-name">Form Validation</span></a></li>
                    <li class="nav-item"><a href="smart.wizard.html"><i class="nav-icon i-Width-Window"></i><span class="item-name">Smart Wizard</span></a></li>
                    <li class="nav-item"><a href="tag.input.html"><i class="nav-icon i-Tag-2"></i><span class="item-name">Tag Input</span></a></li>
                    <li class="nav-item"><a href="editor.html"><i class="nav-icon i-Pen-2"></i><span class="item-name">Rich Editor</span></a></li>
                </ul>


            </div>
            <div class="sidebar-overlay"></div>
</div>
