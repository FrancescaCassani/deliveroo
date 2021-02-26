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
            <input type="submit" />
            <input type="hidden" id="nonce" name="payment_method_nonce"/>
            <input type="hidden" :value="finalPrice" id="amount" name="amount"/>
            <label for="amount">@{{finalPrice}}</label>
        </form>
    </div>

    <input type="submit" />
    <input type="hidden" id="nonce" name="payment_method_nonce"/>
</form> --}}

<div class="braintree-dropin">
    <form id="payment-form" class="form-group" action="{{ route('payment') }}" method="POST">
      @csrf
      @method('POST')
      <input type="hidden" name="amount" id="amount">
      <input type="hidden" id="nonce" name="payment_method_nonce"/>
      <input type="hidden" name="slug" value="{{ $restaurant->slug }}" />
      <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}" />
      <label for="phone_number">Numero di Telefono</label>
      <input type="text" name="phone_number" value="{{ old('phone_number') }}" id="phone_number" />
      <label for="address">Indirizzo di Consegna</label>
      <input type="text" name="address" value="{{ old('address') }}" id="address" />
      <label for="email">Email</label>
      <input type="text" name="email" value="{{ old('email') }}" id="email" />
      <label for="name">Name</label>
      <input type="text" name="name" value="{{ old('name') }}" id="name" />
      <label for="last_name">Last name</label>
      <input type="text" name="last_name" value="{{ old('last_name') }}" id="last_name" />
      <div id="dropin-container"></div>

      <input type="submit" />
    </form>

    <script type="text/javascript">
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