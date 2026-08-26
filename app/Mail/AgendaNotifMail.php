<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class AgendaNotifMail extends Mailable
{
    use Queueable, SerializesModels;

    public Collection $agendaHariIni;
    public string $tanggalHariIni;
    public int $jumlahPimpinan;
    public int $jumlahUmum;

    public function __construct(Collection $agendaHariIni)
    {
        $this->agendaHariIni   = $agendaHariIni;
        $this->tanggalHariIni  = Carbon::today()->translatedFormat('l, d F Y');
        $this->jumlahPimpinan  = $agendaHariIni->where('category', 'pimpinan')->count();
        $this->jumlahUmum      = $agendaHariIni->where('category', 'umum')->count();
    }

    public function envelope(): Envelope
    {
        $tanggal = Carbon::today()->translatedFormat('d F Y');
        $total   = $this->agendaHariIni->count();

        return new Envelope(
            subject: "📋 Ringkasan Agenda Hari Ini ({$total} Kegiatan) – {$tanggal}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.agenda-notif',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
