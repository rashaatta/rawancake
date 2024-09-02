<div class="team-3-content">
    <div class="team-3-head">
        <span class="team-3-name">{{ getLogged()->getReferralUrl() }}</span>
        <span class="team-3-designation">
          <button class="dlicon btn-black btn-primary-hover rounded-0 mt-6 copy-to-clipboard" data-clipboard-text="{{ getLogged()->getReferralUrl() }}">
        @langucw('copy referral link')
    </button></span>
    </div>
</div>









@push('scripts')
    <script>
        var clipboard = new ClipboardJS('.copy-to-clipboard');
        clipboard.on('success', function(e) {
            e.clearSelection();
            toastr.success('{{ __('copied successfully') }}', '{{ __('copied') }}', {
                timeOut: 5000,
                "positionClass": "toast-bottom-right",

            })
        });

    </script>
@endpush
