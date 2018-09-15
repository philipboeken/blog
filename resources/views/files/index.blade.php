@extends('layouts.center')

@section('title')
    Files
@endsection

@section('content-mid')
    <div class="box add-button">
        <div class="columns is-centered">
            <div class="column is-narrow">
            <b-field class="file">
                <b-upload v-model="attachment" @input="submitForm">
                    <a class="button is-white">
                        <b-icon icon="upload"></b-icon>
                        <span>Click to upload</span>
                    </a>
                </b-upload>
                <span class="file-name"
                      v-if="attachment && attachment.length">
                    @{{ attachment[0].name }}
                </span>
            </b-field>
        </div>
    </div>
    </div>

    <b-modal :active.sync="modalActive">
        <p class="image is-4by3">
            <img src="" :src="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name" :alt="file.name">
        </p>
    </b-modal>

    <div class="box">
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
            <div class="columns is-centered" v-if="pagination.total == 0" v-cloak>
                <div class="column is-narrow">
                    <span class="title is-3">This folder is empty!</span>
                </div>
            </div>

            <div class="columns">
                <div class="column " :class="isVideo  ? 'is-half'  : 'is-one-fifth'" v-for="file in files" v-cloak>
                    <div class="card " :class="file.type == 'image' ? 'is-image' : ''">
                        <div class="card-image">
                            <button class="delete is-pulled-right" title="Delete" @click="prepareToDelete(file)"></button>

                            <div v-if="file.type == 'image'">
                                <figure class="image is-4by3" @click="showModal(file)">
                                    <img  src=""  :src="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name" :alt="file.name">
                                </figure>
                                <a class="button is-fullwidth" href="" :href="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name" target="_blank">
                                    <i class="fas fa-download" aria-hidden="true"></i>
                                    &nbsp;Origineel
                                </a>
                            </div>

                            <div v-if="file.type == 'audio'">
                                <figure class="image is-4by3">
                                    <img src="" alt="Audio image" id="audio_image">
                                </figure>
                                <audio controls>
                                    <source src="" :src="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name" :type="'audio/' + file.extension">
                                    Your browser does not support the audio tag.
                                </audio>
                            </div>

                            <div v-if="file.type == 'video'" class="video_block">
                                <video controls>
                                    <source src="" :src="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name" :type="'video/' + file.extension">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <div v-if="file.type == 'document'" class="document_block">
                                <b-icon
                                    icon="file"
                                    custom-size="fa-5x">
                                </b-icon>
                                <a class="button is-fullwidth" href="" :href="'{{ asset('storage/' . Auth::user()->first_name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name" target="_blank">
                                    <i class="fas fa-download" aria-hidden="true"></i>
                                    &nbsp;Download
                                </a>
                            </div>
                      </div>
                      <div class="card-content">
                            <div class="content">
                                <p v-if="file !== editingFile" @dblclick="editFile(file)" :title="'Double click for editing filename'">
                                    @{{ file.name }}
                                </p>
                                <input class="input" v-if="file === editingFile" v-autofocus @keyup.enter="endEditing(file)" @blur="endEditing(file)" type="text" :placeholder="file.name" v-model="file.name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr v-if="pagination.last_page>1">

        <b-pagination v-if="pagination.last_page>1"
            :total="pagination.total"
            :current.sync="pagination.current_page"
            :per-page="pagination.per_page"
            order="is-centered"
            @change="changePage">
        </b-pagination>
    </div>
@endsection
