@if ($errors->any() || session('success'))
    <div class="alert alert-important @if (session('success')) alert-success @else alert-danger @endif alert-dismissible fade show" role="alert" style="width: 300px; position: absolute; top: 20px; right: 20px;">
        <div class="d-flex">
            <div>
                @if (session('success'))
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                @endif
                @if ($errors->any())
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                        <path d="M12 8v4"></path>
                        <path d="M12 16h.01"></path>
                    </svg>
                @endif
            </div>
            <div>
                @if (session('success'))
                    {{ session('success') }}
                @endif
                @if ($errors->any())
                    {{ implode('', $errors->all(':message')) }}
                @endif
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    setTimeout(function() {
        let alertElement = document.querySelector('.alert');
        if (alertElement) {
            let bsAlert = new bootstrap.Alert(alertElement);
            bsAlert.close();
        }
    }, 3000);
</script>
