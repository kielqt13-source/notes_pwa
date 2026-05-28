<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #10b981;
            --primary-dark: #047857;
            --surface: #ffffff;
            --surface-secondary: #f8fafc;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
            --border: #e2e8f0;
            --error: #ef4444;
            --error-bg: #fef2f2;
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%);
            min-height: 100vh;
            color: var(--text-primary);
        }

        .top-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 16px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }

        .header-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .brand-text h1 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            letter-spacing: -0.3px;
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
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .user-info .role {
            font-size: 0.75rem;
            color: var(--primary);
            font-weight: 500;
        }

        .logout-btn {
            background: white;
            border: 1px solid var(--border);
            color: var(--text-secondary);
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #fef2f2;
            border-color: #ef4444;
            color: #ef4444;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        .main-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 32px 24px 64px;
        }

        .page-header {
            background: white;
            border-radius: 20px;
            padding: 32px;
            margin-bottom: 36px;
            box-shadow: var(--shadow-md);
            border-left: 4px solid var(--primary);
        }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a.admin-badge:hover {
            transform: translateY(-2px);
            color: white;
        }

        .page-header h2 {
            font-size: clamp(1.75rem, 4vw, 2.25rem);
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .page-header p {
            font-size: 0.95rem;
            color: var(--text-secondary);
            margin: 0;
            font-weight: 400;
        }

        .add-note-card {
            background: white;
            border-radius: 20px;
            padding: 32px;
            margin-bottom: 40px;
            box-shadow: var(--shadow-md);
            border: 2px solid var(--border);
            transition: border-color 0.3s ease;
        }

        .add-note-card:hover {
            border-color: var(--primary);
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: var(--primary);
        }

        .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 8px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .form-control {
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            background: var(--surface-secondary);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
            background: white;
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            color: white;
            padding: 12px 28px;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        .notes-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .notes-header h3 {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .notes-count {
            font-size: 0.85rem;
            color: var(--primary);
            background: #d1fae5;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
        }

        .notes-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .note-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid var(--border);
        }

        .note-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
            border-color: var(--primary);
        }

        .note-title {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 12px;
            line-height: 1.4;
            word-break: break-word;
        }

        .note-content {
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: 20px;
            word-break: break-word;
            font-weight: 400;
        }

        .note-author {
            font-size: 0.85rem;
            color: var(--primary);
            font-weight: 500;
            margin-bottom: 16px;
        }

        .note-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }

        .note-meta {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .btn-delete {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #ef4444;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 72px 24px;
            background: white;
            border: 2px dashed var(--border);
            border-radius: 20px;
        }

        .empty-state i {
            font-size: 3.5rem;
            color: var(--text-muted);
            margin-bottom: 20px;
            display: block;
        }

        .empty-state h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        @media (min-width: 640px) {
            .user-info { display: block; }
            .notes-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (min-width: 1024px) {
            .notes-grid { grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); }
            .header-content { padding: 0 32px; }
            .main-container { padding: 40px 32px 64px; }
        }

        @media (max-width: 640px) {
            body { background-attachment: scroll; }
            .header-content { padding: 0 14px; gap: 10px; }
            .brand-text h1 { font-size: 1.3rem; }
            .logout-btn .logout-label { display: none; }
            .logout-btn { padding: 9px 11px; }
            .main-container { padding: 20px 14px 56px; }
            .page-header { padding: 24px 20px; margin-bottom: 24px; }
            .page-header h2 { font-size: 1.5rem; }
            .add-note-card { padding: 24px 20px; margin-bottom: 28px; }
            .card-title { font-size: 1.2rem; }
            .form-control { font-size: 16px; padding: 12px 14px; }
            .btn-submit { width: 100%; justify-content: center; padding: 14px 20px; }
            .notes-header { flex-direction: column; align-items: flex-start; gap: 8px; margin-bottom: 20px; }
            .notes-header h3 { font-size: 1.3rem; }
            .notes-grid { grid-template-columns: 1fr; gap: 20px; }
            .note-card { padding: 20px; }
            .note-card:hover { transform: translateY(-2px); }
            .note-title { font-size: 1.1rem; }
            .note-content { font-size: 0.9rem; }
            .empty-state { padding: 48px 20px; }
            .empty-state h3 { font-size: 1.2rem; }
        }

        @media (max-width: 380px) {
            .brand-text h1 { font-size: 1.1rem; }
            .page-header h2 { font-size: 1.3rem; }
        }
    </style>
</head>
<body>

    <div class="top-header">
        <div class="header-content">
            <div class="brand">
                <div class="brand-icon">
                    <i class="bi bi-journal-text"></i>
                </div>
                <div class="brand-text">
                    <h1>My Notes</h1>
                </div>
            </div>

            <div class="user-section">
                <div class="user-info">
                    <div class="name">{{ auth()->user()->name }}</div>
                    <div class="role">{{ auth()->user()->role == 1 ? 'Admin' : 'User' }}</div>
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

    <div class="main-container">
        <div class="page-header">
            @php $user = auth()->user(); @endphp
            <h2>Hello, {{ auth()->user()->name }} 👋</h2>
            @if (auth()->user()->role == 1)
                <p>As an admin, you can see all notes from all users here.</p>
            @else
                <p>Your thoughts, captured. Your notes, organized.</p>
            @endif
        </div>

        @if(auth()->user()->role != 1)
        <div class="add-note-card">
            <h3 class="card-title">
                <i class="bi bi-pencil-square"></i>
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
                        placeholder="Give your note a meaningful title…"
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
                <button type="submit" class="btn-submit">
                    <i class="bi bi-plus-lg"></i>
                    Create Note
                </button>
            </form>
        </div>
        @endif

        @if(isset($notes) && count($notes) > 0)
            <div class="notes-header">
                @if (auth()->user()->role == 1)
                    <h3><i class="bi bi-collection" style="color: var(--primary); margin-right: 8px;"></i>All Notes</h3>
                @else
                    <h3><i class="bi bi-sticky" style="color: var(--primary); margin-right: 8px;"></i>Your Notes</h3>
                @endif
                <span class="notes-count">{{ count($notes) }} {{ count($notes) === 1 ? 'Note' : 'Notes' }}</span>
            </div>

            <div class="notes-grid">
                @foreach($notes as $note)
                    <div class="note-card">
                        <h4 class="note-title">{{ $note->title }}</h4>
                        <p class="note-content">{{ $note->content }}</p>
                        @if(auth()->user()->role == 1)
                            <div class="note-author">
                                <i class="bi bi-person-circle"></i> {{ $note->user->name ?? 'Unknown User' }}
                            </div>
                        @endif
                        <div class="note-footer">
                            <span class="note-meta">
                                <i class="bi bi-clock"></i>
                                {{ $note->created_at ? $note->created_at->diffForHumans() : 'Recently' }}
                            </span>
                            @if(auth()->user()->role != 1)
                            <form method="POST" action="/notes/{{ $note->id }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Delete this note?')"
                                >
                                    <i class="bi bi-trash"></i>
                                    Delete
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="bi bi-journal-plus"></i>
                <h3>No notes yet</h3>
                <p>Start by creating your first note above</p>
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>