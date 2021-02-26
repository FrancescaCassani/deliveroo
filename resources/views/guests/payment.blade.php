@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - Homepage</title>
@endsection

@section('content')
<div class="text-center">
    <div class="container">
        <form id="payment-form" action="{{ route('payment') }}" method="post">
            <div id="dropin-container"></div>
            <input type="text" value="nome utente">
            <input type="text" value="cognome utente">
            <input type="text" value="indirizzo utente">
            <input @click="puliziaCache" type="submit" />
            <input type="hidden" id="nonce" name="payment_method_nonce"/>
            <input type="hidden" :value="finalPrice" id="amount" name="amount"/>
            <label for="amount">@{{finalPrice}}</label>
        </form>
    </div>
</div>
@endsection


@section('script')
<script>
  const form = document.getElementById('payment-form');
  const clientToken = '@php echo($clientToken) @endphp';
  braintree.dropin.create({
      authorization: clientToken,
      container: document.getElementById('dropin-container'),
  }, (error, dropinInstance) => {
      if (error) console.error(error);
      form.addEventListener('submit', event => {
          event.preventDefault();
          dropinInstance.requestPaymentMethod((error, payload) => {
          if (error) {
              console.error(error);
          }
          document.getElementById('nonce').value = payload.nonce;
          form.submit();
          });
      });
  });
</script>
@endsection


