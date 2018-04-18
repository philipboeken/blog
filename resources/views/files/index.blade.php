@extends('layouts.center')

@section('title')
    Files
@endsection

@section('content-mid')
    @include('files.notification')
    @include('files.file-form')
    @include('files.confirm')
    @include('files.modal')

    <div class="container is-fluid box">
        <div class="tabs is-centered is-large">
            <ul>
                <li :class="{'is-active': isActive('image')}" @click="getFiles('image')">
                    <a>
                        <span class="icon is-small"><i class="fas fa-image"></i></span>
                        <span>Pictures</span>
                    </a>
                </li>
                <li :class="{'is-active': isActive('audio')}" @click="getFiles('audio')">
                   <a>
                        <span class="icon is-small"><i class="fas fa-music"></i></span>
                        <span>Music</span>
                    </a>
                </li>
                <li :class="{'is-active': isActive('video')}" @click="getFiles('video')">
                    <a>
                        <span class="icon is-small"><i class="fas fa-film"></i></span>
                        <span>Videos</span>
                    </a>
                </li>
                <li :class="{'is-active': isActive('document')}" @click="getFiles('document')">
                    <a>
                        <span class="icon is-small"><i class="fas fa-file"></i></span>
                        <span>Documents</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tabs-details">
            <div class="columns is-multiline">

                <div class="is-empty column is-6 is-offset-3" v-if="pagination.total == 0" v-cloak>
                    <p class="title is-2">This folder is empty!</p>
                </div>

                {{-- <div class="loading column" v-if="loading">
                    <i class="fas fa-spinner fa-pulse fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </div> --}}

                <div class="column " :class="isVideo  ? 'is-half'  : 'is-one-fifth'" v-for="file in files" v-cloak>
                    <div class="card " :class="file.type == 'image' ? 'is-image' : ''">
                        <div class="card-image">
                            <button class="delete delete-file is-pulled-right" title="Delete" @click="prepareToDelete(file)"></button>
                            
                            <div v-if="file.type == 'image'"> 
                                <figure class="image is-4by3" @click="showModal(file)">
                                    <img  src=""  :src="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" :alt="file.name">
                                </figure>
                                <a class="button is-fullwidth" href="" :href="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" target="_blank">
                                    <i class="fas fa-download" aria-hidden="true"></i>
                                    &nbsp;Origineel
                                </a>
                            </div>

                            <div v-if="file.type == 'audio'">
                                <figure class="image is-4by3">
                                    <img src="" alt="Audio image" id="audio_image">
                                </figure>
                                <audio controls>
                                    <source src="" :src="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" :type="'audio/' + file.extension">
                                    Your browser does not support the audio tag.
                                </audio>
                            </div>

                            <div v-if="file.type == 'video'" class="video_block">
                                <video controls>
                                    <source src="" :src="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" :type="'video/' + file.extension">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <div v-if="file.type == 'document'" class="document_block">
                                <figure class="image is-4by3">
                                    <img src="" alt="Document image" id="audio_image">
                                </figure>
                                <a class="button is-fullwidth" href="" :href="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" target="_blank">
                                    <i class="fas fa-download" aria-hidden="true"></i>
                                    &nbsp;Download
                                </a>
                            </div>
                      </div>
                      <div class="card-content">
                            <div class="content">
                                <p v-if="file !== editingFile" @dblclick="editFile(file)" :title="'Double click for editing filename'">
                                    @{{ file.name + '.' + file.extension}}
                                </p>
                                <input class="input" v-if="file === editingFile" v-autofocus @keyup.enter="endEditing(file)" @blur="endEditing(file)" type="text" :placeholder="file.name" v-model="file.name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="pagination is-centered" role="navigation" aria-label="pagination" v-if="pagination.last_page > 1" v-cloak>
            <a class="pagination-previous" @click.prevent="changePage(1)" :disabled="pagination.current_page <= 1">First page</a>
            <a class="pagination-previous" @click.prevent="changePage(pagination.current_page - 1)" :disabled="pagination.current_page <= 1">Previous</a>
            <a class="pagination-next" @click.prevent="changePage(pagination.current_page + 1)" :disabled="pagination.current_page >= pagination.last_page">Next page</a>
            <a class="pagination-next" @click.prevent="changePage(pagination.last_page)" :disabled="pagination.current_page >= pagination.last_page">Last page</a>
            <ul class="pagination-list">
                <li v-for="page in pages">
                    <a class="pagination-link" :class="isCurrentPage(page) ? 'is-current' : ''" @click.prevent="changePage(page)">
                        @{{ page }}
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
