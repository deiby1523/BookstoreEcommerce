<style>

    .row-hover:hover {
        background-color: #f8f9fa;
    }

    #loading {
        display: none;
    }


    .loader {
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top: 4px solid #fb8c00;
        width: 24px;
        height: 24px;
        animation: spin 1s linear infinite;
        margin-right: 10px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .truncated-text-large {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 350px; /* max width before truncate  */
    }

    .truncated-text-short {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 150px; /* max width before truncate */
    }

    .pag-link {
        width: 80px !important;
    }

    .badge-success {
        color: #339537;
        background-color: #bce2be;
    }

    .badge.badge-secondary {
        background-color: #d7d9e1;
        color: #6c757d;
    }

    .badge-sm {
        padding: .45em .775em;
        font-size: .65em;
        border-radius: .375rem;
    }
</style>
