<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        <h5 class="card-title">Send Mail</h5>
                        <p class="card-text">Please fill all required input to send an email.</p>
                        <form action = "/send/mail" method = "post">
                            <input type = "hidden" name="_token" value = "<?= csrf_token() ?>">
                            <div class="mb-3">
                                <label for="email" class="form-label">To*</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject*</label>
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body*</label>
                                <textarea class="form-control" id="body" name="body" rows="3" placeholder="Body"></textarea>
                            </div>
                            <div class="mb-2 offset-10 text-right">
                                <input type="submit" class="btn btn-primary" value="Send Email" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
