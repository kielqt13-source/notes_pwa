<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts: Caveat (handwritten display) + Lora (refined body) -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Lora:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --paper:       #fdf8ef;
            --paper-dark:  #f5eedc;
            --paper-line:  #ddd5c0;
            --ink:         #2c2416;
            --ink-light:   #6b5f4a;
            --ink-faint:   #b0a48c;
            --accent:      #c84b31;        /* red pen accent */
            --accent-light:#f0e4e0;
            --tab-blue:    #2f5fa8;
            --tab-blue-lt: #e3ecf9;
            --sticky-y:    #fde98b;
            --sticky-g:    #b8e6b8;
            --sticky-b:    #b8d6f5;
            --sticky-p:    #e8c8f0;
            --shadow-sm:   2px 3px 8px rgba(44,36,22,0.12);
            --shadow-md:   4px 6px 18px rgba(44,36,22,0.15);
            --radius:      4px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Lora', Georgia, serif;
            background-color: var(--paper-dark);
            background-image:
                repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 27px,
                    var(--paper-line) 27px,
                    var(--paper-line) 28px
                );
            background-attachment: fixed;
            min-height: 100vh;
            color: var(--ink);
        }

        /* ─── HEADER ─── */
        .top-header {
            background: var(--ink);
            border-bottom: 4px solid var(--accent);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Spiral notebook rings decoration */
        .brand-rings {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .ring {
            width: 18px;
            height: 18px;
            border: 2.5px solid var(--ink-faint);
            border-radius: 50%;
            background: transparent;
            box-shadow: inset 0 0 0 1.5px var(--ink);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }
        .brand-text h1 {
            font-family: 'Caveat', cursive;
            font-size: 1.9rem;
            font-weight: 700;
            color: #fff;
            margin: 0;
            letter-spacing: 0.5px;
            line-height: 1;
        }
        .brand-text span {
            font-size: 0.65rem;
            color: var(--ink-faint);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info {
            text-align: right;
            display: none;
        }
        .user-info .name {
            font-family: 'Caveat', cursive;
            font-size: 1.1rem;
            font-weight: 600;
            color: #fff;
        }
        .user-info .role {
            font-size: 0.7rem;
            color: var(--ink-faint);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .logout-btn {
            background: transparent;
            border: 1.5px solid rgba(255,255,255,0.25);
            color: rgba(255,255,255,0.8);
            padding: 7px 16px;
            border-radius: 2px;
            font-size: 0.825rem;
            font-family: 'Lora', serif;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }
        .logout-btn:hover {
            border-color: var(--accent);
            color: #fff;
            background: rgba(200,75,49,0.15);
        }

        /* ─── MAIN ─── */
        .main-container {
            max-width: 1160px;
            margin: 0 auto;
            padding: 40px 28px 60px;
        }

        /* ─── PAGE HEADER ─── */
        .page-header {
            background: var(--paper);
            border: 1.5px solid var(--paper-line);
            border-left: 5px solid var(--accent);
            border-radius: var(--radius);
            padding: 24px 28px;
            margin-bottom: 36px;
            box-shadow: var(--shadow-sm);
            position: relative;
        }
        .page-header::before {
            /* red margin line */
            content: '';
            position: absolute;
            left: 52px;
            top: 0;
            bottom: 0;
            width: 1px;
            background: rgba(200,75,49,0.25);
        }

        .page-header h2 {
            font-family: 'Caveat', cursive;
            font-size: 2.4rem;
            font-weight: 700;
            color: var(--ink);
            margin: 0 0 4px;
            padding-left: 20px;
        }
        .page-header p {
            font-size: 0.9rem;
            color: var(--ink-light);
            margin: 0;
            font-style: italic;
            padding-left: 20px;
        }

        .admin-badge {
            display: inline-block;
            background: var(--tab-blue);
            color: #fff;
            font-size: 0.7rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 2px;
            margin-bottom: 8px;
            font-family: 'Lora', serif;
        }

        /* ─── ADD NOTE CARD ─── */
        .add-note-card {
            background: var(--paper);
            border: 1.5px solid var(--paper-line);
            border-radius: var(--radius);
            padding: 28px 28px 24px;
            margin-bottom: 40px;
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }



        /* Margin line */
        .add-note-card::after {
            content: '';
            position: absolute;
            left: 56px;
            top: 0;
            bottom: 0;
            width: 1px;
            background: rgba(200,75,49,0.3);
            pointer-events: none;
        }

        .card-title {
            font-family: 'Caveat', cursive;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--ink);
            margin: 0 0 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }
        .card-title i {
            color: var(--accent);
            font-size: 1.3rem;
        }

        .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--tab-blue);
            margin-bottom: 6px;
            display: block;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            position: relative;
        }

        .form-control {
            border: 0;
            border-bottom: 1.5px solid var(--paper-line);
            border-radius: 0;
            padding: 8px 4px;
            font-size: 1rem;
            font-family: 'Caveat', cursive;
            font-size: 1.15rem;
            background: transparent;
            color: var(--ink);
            transition: border-color 0.2s;
            position: relative;
        }
        .form-control:focus {
            border-bottom-color: var(--accent);
            box-shadow: none;
            outline: none;
            background: transparent;
        }
        .form-control::placeholder {
            color: var(--ink-faint);
            font-style: italic;
        }
        textarea.form-control {
            resize: vertical;
            min-height: 90px;
            line-height: 1.8;
        }

        .btn-primary-custom {
            background: var(--accent);
            border: none;
            color: #fff;
            padding: 10px 24px;
            border-radius: 2px;
            font-family: 'Caveat', cursive;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            position: relative;
        }
        .btn-primary-custom:hover {
            background: #a83828;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(200,75,49,0.35);
        }

        /* ─── NOTES SECTION HEADER ─── */
        .notes-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--paper-line);
        }
        .notes-header h3 {
            font-family: 'Caveat', cursive;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--ink);
            margin: 0;
        }
        .notes-count {
            font-size: 0.8rem;
            color: var(--ink-light);
            background: var(--paper-dark);
            border: 1px solid var(--paper-line);
            padding: 4px 14px;
            border-radius: 20px;
            font-family: 'Lora', serif;
            font-style: italic;
        }

        /* ─── NOTES GRID ─── */
        .notes-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        /* Sticky-note color rotation */
        .note-card:nth-child(4n+1) { --sticky: var(--sticky-y); }
        .note-card:nth-child(4n+2) { --sticky: var(--sticky-b); }
        .note-card:nth-child(4n+3) { --sticky: var(--sticky-g); }
        .note-card:nth-child(4n+4) { --sticky: var(--sticky-p); }

        .note-card {
            background: var(--sticky);
            border: none;
            border-radius: 2px;
            padding: 22px 20px 18px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: var(--shadow-sm), inset 0 -2px 0 rgba(0,0,0,0.08);
            position: relative;
            /* Slight random rotation for authenticity */
        }
        .note-card:nth-child(odd)  { transform: rotate(-0.6deg); }
        .note-card:nth-child(even) { transform: rotate(0.4deg); }
        .note-card:hover {
            transform: rotate(0deg) translateY(-4px) scale(1.02);
            box-shadow: var(--shadow-md), inset 0 -2px 0 rgba(0,0,0,0.1);
            z-index: 2;
        }

        /* Fold corner effect */
        .note-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 0 20px 20px;
            border-color: transparent transparent rgba(0,0,0,0.10) transparent;
        }

        /* Tape strip at top */
        .note-card::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 48px;
            height: 16px;
            background: rgba(255,255,255,0.55);
            border-radius: 1px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .note-title {
            font-family: 'Caveat', cursive;
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--ink);
            margin: 0 0 10px;
            word-break: break-word;
            line-height: 1.3;
            border-bottom: 1px solid rgba(44,36,22,0.15);
            padding-bottom: 8px;
        }

        .note-content {
            font-family: 'Caveat', cursive;
            font-size: 1.05rem;
            color: var(--ink);
            line-height: 1.75;
            margin-bottom: 16px;
            word-break: break-word;
        }

        .note-author {
            font-size: 0.78rem;
            color: var(--ink-light);
            font-family: 'Lora', serif;
            font-style: italic;
            margin-bottom: 10px;
        }

        .note-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
            border-top: 1px dashed rgba(44,36,22,0.2);
        }

        .note-meta {
            font-size: 0.72rem;
            color: var(--ink-light);
            font-family: 'Lora', serif;
            font-style: italic;
        }

        .btn-delete {
            background: rgba(200,75,49,0.12);
            border: 1px solid rgba(200,75,49,0.3);
            color: var(--accent);
            padding: 5px 11px;
            border-radius: 2px;
            font-size: 0.78rem;
            font-family: 'Lora', serif;
            font-weight: 600;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
        }
        .btn-delete:hover {
            background: var(--accent);
            color: #fff;
            border-color: var(--accent);
        }

        /* ─── EMPTY STATE ─── */
        .empty-state {
            text-align: center;
            padding: 72px 24px;
            background: var(--paper);
            border: 1.5px dashed var(--paper-line);
            border-radius: var(--radius);
        }
        .empty-icon {
            font-size: 3.5rem;
            margin-bottom: 16px;
            opacity: 0.4;
        }
        .empty-state h3 {
            font-family: 'Caveat', cursive;
            font-size: 1.75rem;
            color: var(--ink);
            margin-bottom: 8px;
        }
        .empty-state p {
            font-size: 0.9rem;
            color: var(--ink-light);
            font-style: italic;
        }

        /* ─── RESPONSIVE ─── */

        /* Tablet: 2-col grid */
        @media (min-width: 640px) {
            .user-info { display: block; }
            .notes-grid { grid-template-columns: repeat(2, 1fr); }
        }

        /* Desktop: auto-fill */
        @media (min-width: 1024px) {
            .notes-grid { grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); }
        }

        /* ── Mobile (≤ 640px) ── */
        @media (max-width: 640px) {

            /* iOS Safari: fixed backgrounds cause jank/blank */
            body { background-attachment: scroll; }

            /* Header */
            .header-content { padding: 0 14px; gap: 10px; }
            .brand-text h1 { font-size: 1.5rem; }
            .brand-text span { display: none; }
            .brand-rings { gap: 3px; }
            .ring { width: 14px; height: 14px; }

            /* Collapse logout to icon-only */
            .logout-btn .logout-label { display: none; }
            .logout-btn { padding: 9px 11px; }

            /* Main */
            .main-container { padding: 20px 14px 56px; }

            /* Page header */
            .page-header {
                padding: 18px 16px 18px 18px;
                margin-bottom: 24px;
            }
            .page-header::before { display: none; }
            .page-header h2 {
                font-size: 1.75rem;
                padding-left: 0;
            }
            .page-header p { padding-left: 0; }

            /* Add note card */
            .add-note-card {
                padding: 20px 16px 18px;
                margin-bottom: 28px;
            }
            /* Hide the margin-line pseudo on mobile — not enough room */
            .add-note-card::after { display: none; }
            .card-title { font-size: 1.35rem; }

            /* Inputs — min 16px prevents iOS zoom */
            .form-control {
                font-size: 1rem;
                padding: 10px 4px;
            }

            /* Submit button — full width on mobile */
            .btn-primary-custom {
                width: 100%;
                justify-content: center;
                padding: 13px 20px;
                font-size: 1.1rem;
            }

            /* Notes header */
            .notes-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
                margin-bottom: 20px;
            }
            .notes-header h3 { font-size: 1.5rem; }

            /* Notes grid: single column */
            .notes-grid { grid-template-columns: 1fr; gap: 20px; }

            /* Remove rotation on small screens — too cramped */
            .note-card:nth-child(odd),
            .note-card:nth-child(even) { transform: none; }
            .note-card:hover { transform: translateY(-3px) scale(1.01); }

            /* Touch-friendly delete button */
            .btn-delete {
                padding: 8px 14px;
                font-size: 0.82rem;
            }

            /* Note text sizes */
            .note-title { font-size: 1.2rem; }
            .note-content { font-size: 1rem; }

            /* Empty state */
            .empty-state { padding: 48px 20px; }
            .empty-state h3 { font-size: 1.4rem; }
        }

        /* ── Very small (≤ 380px) ── */
        @media (max-width: 380px) {
            .brand-text h1 { font-size: 1.3rem; }
            .page-header h2 { font-size: 1.5rem; }
        }

        /* ─── FADE-IN ANIMATION ─── */
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .note-card {
            animation: fadeSlideUp 0.35s ease both;
        }
        .note-card:nth-child(1) { animation-delay: 0.05s; }
        .note-card:nth-child(2) { animation-delay: 0.10s; }
        .note-card:nth-child(3) { animation-delay: 0.15s; }
        .note-card:nth-child(4) { animation-delay: 0.20s; }
        .note-card:nth-child(5) { animation-delay: 0.25s; }
        .note-card:nth-child(6) { animation-delay: 0.30s; }
    </style>
</head>
<body>

    <!-- ── HEADER ── -->
    <div class="top-header">
        <div class="header-content">
            <div class="brand">
                <div class="brand-rings">
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="ring"></div>
                </div>
                <div class="brand-text">
                    <h1>My Notes</h1>
                    <span>personal notebook</span>
                </div>
            </div>

            <div class="user-section">
                <div class="user-info">
                    <div class="name">{{ auth()->user()->name }}</div>
                    <div class="role">Notebook Owner</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="logout-label">Sign Out</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- ── MAIN ── -->
    <div class="main-container">

        <!-- Page Header -->
        <div class="page-header">
            @php $user = auth()->user(); @endphp
            @if($user->role == 1)
                <div class="admin-badge"><i class="bi bi-shield-check"></i> Admin View</div>
            @endif
            <h2>Hello, {{ auth()->user()->name }} ✏️</h2>
            <p>Your thoughts, captured. Your notes, organized.</p>
        </div>

        <!-- Add Note Card -->
        <div class="add-note-card">
            <h3 class="card-title">
                <i class="bi bi-pencil-fill"></i>
                Write a New Note
            </h3>

            <form method="POST" action="/notes">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Title</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        placeholder="Give your note a title…"
                        required
                        maxlength="100"
                    >
                </div>
                <div class="mb-4">
                    <label class="form-label">Content</label>
                    <textarea
                        name="content"
                        class="form-control"
                        rows="4"
                        placeholder="Write your thoughts here…"
                        required
                    ></textarea>
                </div>
                <button type="submit" class="btn-primary-custom">
                    <i class="bi bi-pin-angle-fill"></i>
                    Pin Note
                </button>
            </form>
        </div>

        <!-- Notes Section -->
        @if(isset($notes) && count($notes) > 0)
            <div class="notes-header">
                <h3><i class="bi bi-sticky" style="font-size:1.4rem; vertical-align:middle; margin-right:6px; color:var(--accent)"></i>Your Notes</h3>
                <span class="notes-count">{{ count($notes) }} {{ count($notes) === 1 ? 'note' : 'notes' }} pinned</span>
            </div>

            <div class="notes-grid">
                @foreach($notes as $note)
                    <div class="note-card">
                        <h4 class="note-title">{{ $note->title }}</h4>
                        <p class="note-content">{{ $note->content }}</p>
                        @if(auth()->user()->role == 1)
                            <div class="note-author">
                                <i class="bi bi-person"></i> {{ $note->user->name }}
                            </div>
                        @endif
                        <div class="note-footer">
                            <span class="note-meta">
                                <i class="bi bi-clock"></i>
                                {{ $note->created_at ? $note->created_at->diffForHumans() : 'Recently' }}
                            </span>
                            <form method="POST" action="/notes/{{ $note->id }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Discard this note?')"
                                >
                                    <i class="bi bi-trash"></i>
                                    Discard
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">📓</div>
                <h3>Your notebook is empty</h3>
                <p>Pick up your pen and write something — your first note awaits.</p>
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>