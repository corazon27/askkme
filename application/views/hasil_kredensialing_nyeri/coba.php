<!-- <?php if ($j['penilaian'] == 'terimakabid') { ?>
                                    <td>
                                        <a href="<?= base_url('askk/admin_nyeri/edit/' . $j['id_checkbox']) ?>" class="btn btn-primary btn-sm mb-2" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('askk/admin_nyeri/kredensialing/' . $j['id_checkbox']) ?>" class="btn btn-warning btn-sm mb-2" target="_blank"><i class="fas fa-fw fa-pencil-alt"></i> Kredensialing</a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('askk/admin_nyeri/cetak/' .  $j['id_checkbox']) ?>" class="btn btn-success btn-sm mb-2" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a><br>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('askk/admin_nyeri/delete/' .  $j['id_checkbox']) ?>" class="btn btn-danger btn-sm mb-2"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('askk/Hasil_kredensialing_nyeri/stj/') . $j['id_checkbox'] . '/' . $j['id_telegram'] ?>" class="btn btn-primary btn-sm mb-2" target="_blank"><i class="fas fa-paper-plane"></i> Kirim Pesan Telegram</a>
                                        <?php endif; ?>
                                    </td>
                                <?php } elseif ($j['penilaian'] == 'tolakkabid') { ?>
                                    <td>
                                        <a href="<?= base_url('askk/admin_nyeri/edit/' . $j['id_checkbox']) ?>" class="btn btn-primary btn-sm mb-2" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('askk/admin_nyeri/kredensialing/' . $j['id_checkbox']) ?>" class="btn btn-warning btn-sm mb-2" target="_blank"><i class="fas fa-fw fa-pencil-alt"></i> Kredensialing</a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('askk/admin_nyeri/cetak/' .  $j['id_checkbox']) ?>" class="btn btn-success btn-sm mb-2" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a><br>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('askk/admin_nyeri/delete/' .  $j['id_checkbox']) ?>" class="btn btn-danger btn-sm mb-2"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('askk/Hasil_kredensialing_nyeri/tlk/') . $j['id_checkbox'] . '/' . $j['id_telegram'] ?>" class="btn btn-primary btn-sm mb-2" target="_blank"><i class="fas fa-paper-plane"></i> Kirim Pesan Telegram</a>
                                        <?php endif; ?>
                                    </td>
                                <?php } ?> -->