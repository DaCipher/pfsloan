<x-home-layout title="Application form" wirecss="@livewireStyles()" wirescript="@livewireScripts()">

    <main id="main" class="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Application</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Loan</li>
                        <li>Application</li>
                    </ol>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        @livewire("application-form")
    </main>




</x-home-layout>