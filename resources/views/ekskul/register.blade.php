<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar') }}
        </h2>
    </x-slot>


                @if (auth()->user()->role == 'user')
                    <form action="{{ route('ekskul.register') }}" method="POST"
                        enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <!-- Amount Input -->
                        <div>
                            <x-input-label for="nis" :value="__('NIS')" />
                            <x-text-input id="nis" name="nis" type="number" :value="old('nis', $member->user->nis)"
                                class="mt-1 block w-full" autofocus autocomplete="nis" />
                            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input id="name" name="name" type="text" :value="old('name', $member->user->name)"
                                class="mt-1 block w-full" autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="bank_beneficiary" :value="__('Bank Name')" />
                            <x-text-input id="bank_beneficiary" name="bank_beneficiary" type="text" :value="old('bank_beneficiary', $payment->bank_beneficiary)"
                                class="mt-1 block w-full" autofocus autocomplete="bank_beneficiary" />
                            <x-input-error class="mt-2" :messages="$errors->get('bank_beneficiary')" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                @endif

                @if (auth()->user()->role == 'admin')
                    <div class="mt-6 flex gap-5">
                        <div class="w-1/2">
                            <h3 class="text-lg font-medium text-gray-900">Payment Detail</h3>
                            <div class="mt-2 flex flex-col gap-4 border p-5 rounded-lg">
                                <div>
                                    <h3 class="font-bold text-lg">Amount</h3>
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-lg font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg">Bank Account Name</h3>
                                    <p class="text-lg uppercase">{{ $payment->bank_name }}</p>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg">Bank Name</h3>
                                    <p class="text-lg uppercase">{{ $payment->bank_beneficiary }}</p>
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <form action="{{ route('payments.approved', $payment->id) }}" method="POST">
                                    @csrf
                                    @method('patch')

                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-700 text-white text-lg font-bold py-1 px-2 rounded mt-5">
                                        Approve
                                    </button>
                                </form>

                                <form action="{{ route('payments.rejected', $payment->id) }}" method="POST">
                                    @csrf
                                    @method('patch')

                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white text-lg font-bold py-1 px-2 rounded mt-5">
                                        Reject
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <h3 class="text-lg font-medium text-gray-900">Payment Proof</h3>
                            <div class="mt-2">
                                <img src="{{ Storage::url($payment->proof_image) }}" alt=""
                                    class="w-full rounded-lg">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
