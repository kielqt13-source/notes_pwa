<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background-color: #f5f7fa;
            padding: 0;
        }

        /* ── Header ── */
        .top-header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .brand-icon {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            background: #2563eb;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.95rem;
        }

        .brand h1 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #111827;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .user-info {
            text-align: right;
        }

        .user-info .name {
            font-size: 0.8125rem;
            font-weight: 600;
            color: #111827;
            white-space: nowrap;
        }

        .user-info .role {
            font-size: 0.6875rem;
            color: #6b7280;
        }

        .logout-btn {
            background: #ffffff;
            border: 1px solid #d1d5db;
            color: #374151;
            padding: 7px 12px;
            border-radius: 8px;
            font-size: 0.8125rem;
            font-weight: 500;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            white-space: nowrap;
        }

        .logout-btn:hover {
            background: #f9fafb;
            border-color: #9ca3af;
            color: #111827;
        }

        .logout-label {
            display: inline;
        }

        /* ── Main Container ── */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px 16px;
        }

        /* ── Page Header ── */
        .page-header {
            margin-bottom: 24px;
        }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .page-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 6px 0;
            word-break: break-word;
        }

        .page-header p {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0;
            line-height: 1.5;
        }

        /* ── Notes Header ── */
        .notes-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .notes-header h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #111827;
            margin: 0;
        }

        .notes-count {
            font-size: 0.8125rem;
            color: #6b7280;
            background: #f3f4f6;
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* ── Notes Grid — mobile-first: 1 column ── */
        .notes-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        /* ── Note Card ── */
        .note-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Lift only on pointer devices to avoid sticky hover on touch */
        @media (hover: hover) and (pointer: fine) {
            .note-card:hover {
                border-color: #2563eb;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                transform: translateY(-2px);
            }
        }

        .note-title {
            font-size: 0.9375rem;
            font-weight: 600;
            color: #111827;
            margin: 0 0 8px 0;
            word-break: break-word;
            line-height: 1.4;
        }

        .note-content {
            font-size: 0.875rem;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 14px;
            word-break: break-word;
        }

        .note-footer {
            display: flex;
            align-items: center;
            padding-top: 12px;
            border-top: 1px solid #f3f4f6;
        }

        .author-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 0.8125rem;
            color: #6b7280;
            font-weight: 500;
            min-width: 0;
        }

        .author-avatar {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            background: #2563eb;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.6875rem;
            font-weight: 700;
        }

        .author-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ── Empty State ── */
        .empty-state {
            text-align: center;
            padding: 48px 20px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .empty-state-icon {
            width: 56px;
            height: 56px;
            background: #f3f4f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
        }

        .empty-state-icon i {
            font-size: 1.75rem;
            color: #9ca3af;
        }

        .empty-state h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0;
        }

        /* ── Breakpoints ── */

        /* Tablet: 2 columns */
        @media (min-width: 600px) {
            .notes-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }
            .main-container {
                padding: 28px 20px;
            }
            .page-header h2 {
                font-size: 1.75rem;
            }
        }

        /* Desktop: 3 columns */
        @media (min-width: 960px) {
            .notes-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }
            .header-content {
                padding: 0 24px;
            }
            .main-container {
                padding: 32px 24px;
            }
            .page-header h2 {
                font-size: 1.875rem;
            }
            .note-card {
                padding: 20px;
            }
            .brand h1 {
                font-size: 1.25rem;
            }
        }

        /* Very small phones (≤ 380px): icon-only logout, hide user info */
        @media (max-width: 380px) {
            .logout-label {
                display: none;
            }
            .logout-btn {
                padding: 7px 10px;
            }
            .user-info {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Top Header -->
    <div class="top-header">
        <div class="header-content">
            <div class="brand">
                <div class="brand-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h1>Admin Panel</h1>
            </div>

            <div class="user-section">
                <div class="user-info">
                    <div class="name">{{ auth()->user()->name }}</div>
                    <div class="role">Administrator</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="logout-label">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="main-container">

        <!-- Page Header -->
        <div class="page-header">
            <div class="admin-badge">
                <i class="bi bi-shield-fill"></i>
                Administrator
            </div>
            <h2>Hello, {{ auth()->user()->name }}</h2>
            <p>Overview of all notes and their authors across the platform</p>
        </div>

        <!-- Notes Section -->
        @if(count($notes) > 0)
            <div class="notes-header">
                <h3>All Notes</h3>
                <span class="notes-count">{{ count($notes) }} {{ count($notes) === 1 ? 'note' : 'notes' }}</span>
            </div>

            <div class="notes-grid">
                @foreach($notes as $note)
                    <div class="note-card">
                        <h4 class="note-title">{{ $note->title }}</h4>
                        <p class="note-content">{{ $note->content }}</p>
                        <div class="note-footer">
                            <span class="author-tag">
                                <span class="author-avatar">
                                    {{ strtoupper(substr($note->user->name, 0, 1)) }}
                                </span>
                                <span class="author-name">{{ $note->user->name }}</span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="bi bi-journal-x"></i>
                </div>
                <h3>No notes found</h3>
                <p>There are no notes created by any users yet</p>
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>