<div>
    @extends('home.layouts.app')
    @section('title', 'Booking')
    @section('content')
        <div x-data="app()" x-cloak>
            <div class="bg-gray-100">
                <div class="mx-auto container p-8">
                    <h3 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl mb-4 ml-4">
                        Booking
                    </h3>

                    <div class="container mx-auto p-6 pt-0 grid grid-cols-3 gap-4">
                        <div class="col-span-2 flex flex-col bg-white rounded-lg border border-gray-200 shadow-md p-4">
                            <div x-show.transition="step === 'complete'">
                                <div class="p-6">
                                    @if ($errors->any())
                                        <h2 class=" text-2xl mb-4 text-red-600 text-center font-bold">Booking kamar gagal!
                                        </h2>
                                        <div class="mb-8 text-sm text-red-600 text-center">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}<br>
                                            @endforeach
                                        </div>
                                    @else
                                        <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Booking kamar berhasil!
                                        </h2>

                                        <div class="text-gray-600 mb-8">
                                            Terimakasih telah memilih hotel kami. <br> Jangan lupa untuk menyerahkan bukti
                                            reservasi
                                            dengan mendownload di bawah ini.
                                        </div>
                                    @endif
                                    <button @click="step = 1"
                                        class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">Kembali
                                    </button>
for
                                    <button wire:click.prevent="unduhPDF"
                                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:ring-lime-200 dark:focus:ring-lime-800">
                                        <span
                                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">

                                            Unduh Bukti Reservasi
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div x-show.transition="step != 'complete'">
                                <div class="border-b-2 p-4">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                        <div class="flex-1">
                                            <ol class="items-center hidden sm:flex">
                                                <li class="relative mb-6 sm:mb-0 w-full">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex z-10 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                                            <svg class="w-3 h-3 text-blue-600" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                                aria-selected="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </div>
                                                        <div x-show="step === 1" x-if="step === 1"
                                                            class="hidden sm:flex w-full bg-blue-600 h-0.5 dark:bg-gray-700">
                                                        </div>
                                                        <div x-show="step !== 1"
                                                            class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700">
                                                        </div>
                                                    </div>

                                                    <div class="mt-3 sm:pr-8">
                                                        <h3 x-show="step === 1" x-if="step === 1"
                                                            class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Data diri</h3>
                                                        <h3 x-show="step !== 1"
                                                            class="text-lg font-semibold text-gray-400 dark:text-white">
                                                            Data diri</h3>
                                                    </div>
                                                </li>
                                                <li class="relative mb-6 sm:mb-0 w-full">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex z-10 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                                            <svg class="w-3 h-3 text-blue-600" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                                aria-selected="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </div>
                                                        <div x-show="step === 2" x-if="step === 2"
                                                            class="hidden sm:flex w-full bg-blue-600 h-0.5 dark:bg-gray-700">
                                                        </div>
                                                        <div x-show="step !== 2"
                                                            class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700">
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 sm:pr-8">
                                                        <h3 x-show="step === 2" x-if="step === 2"
                                                            class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Memilih kamar</h3>
                                                        <h3 x-show="step !== 2"
                                                            class="text-lg font-semibold text-gray-400 dark:text-white">
                                                            Memilih kamar</h3>
                                                    </div>
                                                </li>
                                                <li class="relative mb-6 sm:mb-0 w-full">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex z-10 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                                            <svg class="w-3 h-3 text-blue-600" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                                aria-selected="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </div>
                                                        <div x-show="step === 3" x-if="step === 3"
                                                            class="hidden sm:flex w-full bg-blue-600 h-0.5 dark:bg-gray-700">
                                                        </div>
                                                        <div x-show="step !== 3"
                                                            class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700">
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 sm:pr-8">
                                                        <h3 x-show="step === 3" x-if="step === 3"
                                                            class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Konfirmasi akhir</h3>
                                                        <h3 x-show="step !== 3"
                                                            class="text-lg font-semibold text-gray-400 dark:text-white">
                                                            Konfirmasi akhir</h3>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>

                                <div x-show.transition.in="step === 1">
                                    <div class="p-4 h-96 mt-2">
                                        <div class="relative z-0 mb-6 w-full group">
                                            <label class="block mb-2 text-sm font-medium text-gray-900">for                                            <input type="text" wire:model="nama_pemesan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                        <div class="relative z-0 mb-6 w-full group">
                                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                                Nama Tamu</label>
                                            <input type="text" wire:model="tamu"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                        <div class="relative z-0 mb-6 w-full group">
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Email</label>
                                            <input type="email" wire:model="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                        <div class="relative z-0 mb-6 w-full group">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                No Telepon</label>
                                            <input type="number" wire:model="no_tlp"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div x-show.transition.in="step === 2">
                                    <div class="p-4 h-96 mt-2 flex items-center ">
                                        <div class="grid xl:grid-cols-2 xl:gap-6">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah
                                                    kamar</label>
                                                <input type="number" wire:model="jumlah_kamar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="relative z-0 mb-6 w-full group">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tipe
                                                    kamar</label>
                                                <select wire:model="tipe_kamar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected value="">Pilih tipe</option>
                                                    {{-- @foreach ($kamars as $kamar)
                                                        <option value="{{ $kamar->id }}">
                                                            {{ $kamar->tipe_kamar }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Hanya bisa
                                                    memesan tipe kamar yang sama saat melakukan pemesanan lebih dari 1 kamar
                                                    dalam 1 kali pemesanan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div x-show.transition.in="step === 3">
                                    <div class="p-4 h-96 mt-2">
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 flex rounded-b" x-show="step != 'complete'">
                                <div class="w-1/2">
                                    <button x-show="step > 1" @click="step--" type="button"
                                        class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">Sebelumnya</button>
                                </div>

                                <div class="w-1/2 text-right">
                                    <button x-show="step < 3" @click="step++" type="button"
                                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Selanjutnya</button>

                                    <button @click="step = 'complete'" x-show="step === 3" type="button"
                                        wire:click.prevent="store()"
                                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Konfirmasi</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 flex flex-col bg-white rounded-lg border shadow-md">
                            <div class="flex items-center mb-4 sm:px-6 pt-4">
                                <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2 21V4C2 3.44771 2.44772 3 3 3H4.5C4.79385 1.82459 5.84996 1 7.06155 1H9.93845C11.15 1 12.2061 1.82459 12.5 3H14C14.5523 3 15 3.44772 15 4V10H20C21.1046 10 22 10.8954 22 12V21C22 21.5523 21.5523 22 21 22H15H14H10.5V20.75C10.5 20.3358 10.8358 20 11.25 20C11.6642 20 12 19.6642 12 19.25V19C12 18.4477 11.5523 18 11 18H6C5.44772 18 5 18.4477 5 19V19.25C5 19.6642 5.33579 20 5.75 20C6.16421 20 6.5 20.3358 6.5 20.75V22H3C2.44772 22 2 21.5523 2 21ZM5 5C4.44772 5 4 5.44772 4 6V7C4 7.55228 4.44772 8 5 8H7C7.55228 8 8 7.55228 8 7V6C8 5.44772 7.55228 5 7 5H5ZM9 6C9 5.44772 9.44772 5 10 5H12C12.5523 5 13 5.44772 13 6V7C13 7.55228 12.5523 8 12 8H10C9.44772 8 9 7.55228 9 7V6ZM10 9C9.44772 9 9 9.44772 9 10V11C9 11.5523 9.44772 12 10 12H12C12.5523 12 13 11.5523 13 11V10C13 9.44771 12.5523 9 12 9H10ZM5 9C4.44772 9 4 9.44771 4 10V11C4 11.5523 4.44772 12 5 12H7C7.55228 12 8 11.5523 8 11V10C8 9.44772 7.55228 9 7 9H5ZM4 14C4 13.4477 4.44772 13 5 13H7C7.55228 13 8 13.4477 8 14V15C8 15.5523 7.55228 16 7 16H5C4.44772 16 4 15.5523 4 15V14ZM9 14C9 13.4477 9.44772 13 10 13H12C12.5523 13 13 13.4477 13 14V15C13 15.5523 12.5523 16 12 16H10C9.44772 16 9 15.5523 9 15V14ZM16 13V14C16 14.5523 16.4477 15 17 15H19C19.5523 15 20 14.5523 20 14V13C20 12.4477 19.5523 12 19 12H17C16.4477 12 16 12.4477 16 13ZM16 17C16 16.4477 16.4477 16 17 16H19C19.5523 16 20 16.4477 20 17V18C20 18.5523 19.5523 19 19 19H17C16.4477 19 16 18.5523 16 18V17ZM16 3V7C16 7.55228 16.4477 8 17 8C17.5523 8 18 7.55228 18 7V6H20V7C20 7.55228 20.4477 8 21 8C21.5523 8 22 7.55228 22 7V3C22 2.44772 21.5523 2 21 2C20.4477 2 20 2.44772 20 3V4H18V3C18 2.44772 17.5523 2 17 2C16.4477 2 16 2.44772 16 3Z"
                                        fill="#235D9F"></path>
                                </svg>
                                <h5 class="text-xl ml-2 font-bold leading-none text-gray-900 dark:text-white">
                                    Hotel Algor Bandung
                                </h5>
                            </div>
                            <div class="flow-root">
                                <ul role="list" class="divide-y bg-gray-100 sm:py-4">
                                    <li class="py-3 sm:py-4 px-8">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-500 truncate dark:text-white">
                                                    Check-in
                                                </p>
                                            </div>
                                            <div
                                                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                {{ $tgl_checkin }}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-3 sm:py-4 px-8">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-500 truncate dark:text-white">
                                                    Check-out
                                                </p>
                                            </div>
                                            <div
                                                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                {{ $tgl_checkout }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection

</div>
