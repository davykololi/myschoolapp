                @if(request()->routeIs('superadmin.students'))
                <form action="{{ route('superadmin.students')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('superadmin.admins.index'))
                <form action="{{ route('superadmin.admins.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('superadmin.teachers.index'))
                <form action="{{ route('superadmin.teachers.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('superadmin.accountants.index'))
                <form action="{{ route('superadmin.accountants.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('superadmin.matrons.index'))
                <form action="{{ route('superadmin.matrons.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('superadmin.librarians.index'))
                <form action="{{ route('superadmin.librarians.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('superadmin.subordinates.index'))
                <form action="{{ route('superadmin.subordinates.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('superadmin.payment.sections'))
                <form action="{{ route('superadmin.payment.sections')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('superadmin.parents'))
                <form action="{{ route('superadmin.parents')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('admin.students.index'))
                <form action="{{ route('admin.students.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('admin.parents.index'))
                <form action="{{ route('admin.parents.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('admin.substaffs'))
                <form action="{{ route('admin.substaffs')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('admin.payment-sections.index'))
                <form action="{{ route('admin.payment-sections.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('admin.timetables.index'))
                <form action="{{ route('admin.timetables.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('admin.books.index'))
                <form action="{{ route('admin.books.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('student.library.books'))
                <form action="{{ route('student.library.books')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('librarian.issued-books.index'))
                <form action="{{ route('librarian.issued-books.index')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('librarian.library.books'))
                <form action="{{ route('librarian.library.books')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif

                @if(request()->routeIs('teacher.streams'))
                <form action="{{ route('teacher.streams')}}" method="GET">
                    <x-search-input/>
                </form>
                @endif
